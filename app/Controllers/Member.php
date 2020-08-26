<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{
    protected $memberModel;
    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }
    public function index()
    {
        $key = $this->request->getVar('key');
        if ($key) {
            $member = $this->memberModel->search($key)->getResultArray();
            // $member = $this->memberModel->like('nama', $key);
        } else {
            $member = $this->memberModel->findAll();
        }

        $data = [
            'title' => 'Members',
            'member' => $member,
            'key' => $key
        ];
        return view('member/index', $data);
    }
}
