<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function login()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email required',
                    'valid_email' => 'Please insert a valid email'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password required'
                ]
            ]
        ])) {
            return redirect()->to('index')->withInput();
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $user = $this->userModel->where('email', $email)->get()->getResultArray()[0];
            // Jika user ada
            if ($user) {
                // Jika user active
                if ($user["is_active"] == 1) {
                    // Jika active, cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'user_id' => $user['id']
                        ];
                        session()->set('data', $data);
                        if ($user['role_id'] == 2) {
                            return redirect()->to('/user');
                        } else if ($user['role_id'] == 1) {
                            return redirect()->to('/admin');
                        }
                    } else {
                        session()->setFlashData('c', 'danger');
                        session()->setFlashData('message', 'Wrong Password');
                        return redirect()->to('index')->withInput();
                    }
                } else {
                    session()->setFlashData('c', 'danger');
                    session()->setFlashData('message', 'Email is not activated yet');
                    return redirect()->to('index')->withInput();
                }
            } else {
                // jika user tidak ada, redirect ke login
                session()->setFlashData('c', 'danger');
                session()->setFlashData('message', 'Email not registered');
                return redirect()->to('index')->withInput();
            }
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Registration',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'password2' => [
                'rules' => 'matches[password1]',
                'errors' => [
                    'matches' => 'Validation incorrect'
                ]
            ],
            'email' => [
                'rules' => 'is_unique[users.email]',
                'errors' => [
                    'is_unique' => 'Email already registered'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select your gender'
                ]
            ]
        ])) {
            return redirect()->to('register')->withInput();
        } else {
            if ($this->request->getVar('gender') == 'male') {
                $defaultImg = 'd-male.png';
            } else if ($this->request->getVar('gender') == 'female') {
                $defaultImg = 'd-female.png';
            }
            $data = [
                'id' => 0,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'gender' => $this->request->getVar('gender'),
                'image' => $defaultImg,
                'name' => $this->request->getVar('name'),
                'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date('Y-m-d')
            ];
            $this->userModel->save($data);
            session()->setFlashData('strong', 'Registration Success');
            session()->setFlashData('message', 'Please login using your new account');
            return redirect()->to('index');
        }
        //--------------------------------------------------------------------

    }

    public function logout()
    {
        // Clear Session
        session()->remove('data');
        // Redirect Login
        session()->setFlashData('message', 'You have been logout !');
        return redirect('/');
    }
}
