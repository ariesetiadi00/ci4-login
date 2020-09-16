<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
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
            'title' => 'Dashboard',
            'payment' => $this->get_all()
        ];
        return view('admin/index', $data);
    }

    public function get_all()
    {
        $query = "SELECT member.name, member_payment.month, member_payment.created_at, member_payment.amount
                    FROM member_payment
                    INNER JOIN member
                    ON member_payment.member_id = member.id
                    ORDER BY member_payment.created_at DESC";

        return $this->db->query($query)->getResultArray();
    }
}
