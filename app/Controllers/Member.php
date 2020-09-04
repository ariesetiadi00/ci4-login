<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\UserModel;

class Member extends BaseController
{
    protected $memberModel;
    protected $userModel;
    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->userModel = new UserModel();
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
}
