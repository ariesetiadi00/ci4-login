<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Member extends BaseController
{
    protected $memberModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = session()->get('data');
        $id = $data['user_id'];
        $user = $this->userModel->find($id);
        $key = $this->request->getVar('key');
        if ($key) {
            $member = $this->memberModel->search($key)->getResultArray();
            // $member = $this->memberModel->like('nama', $key);
        } else {
            $member = $this->memberModel->findAll();
        }

        $data = [
            'title' => 'Member',
            'member' => $member,
            'key' => $key,
            'user' => $user
        ];
        return view('member/index', $data);
    }

    public function create()
    {
        $name = $this->request->getVar('name');

        $this->memberModel->save([
            'name' => $name,
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ]);

        session()->setFlashData('strong', 'Insert');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member/index');
    }

    public function edit()
    {
        // Prepare array data
        $data = [
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name')
        ];

        // Update
        $this->memberModel->save($data);

        // Redirect
        session()->setFlashData('strong', 'Edit');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member/index');
    }

    public function delete($id)
    {
        // Delete
        $this->memberModel->delete($id);

        // Redirect
        session()->setFlashData('strong', 'Delete');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member/index');
    }

    public function get()
    {
        $id = $_POST['id'];
        $member = $this->db->query("SELECT * FROM member WHERE id = $id")->getResultArray();


        echo json_encode($member);
    }
}
