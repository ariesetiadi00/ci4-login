<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if ((session()->get('data')) == null) {
            return redirect()->to('/auth');
        }
        $session = session()->get('data');
        $user = $this->userModel->where('email', $session['email'])->get()->getResultArray()[0];

        $data = [
            'user' => $user,
            'title' => 'My Profile'
        ];
        return view('user/index', $data);
    }
}
