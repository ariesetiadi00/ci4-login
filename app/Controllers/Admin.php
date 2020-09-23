<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if ((session()->get('data')) == null) {
            return redirect()->to('/auth');
        }
        $session = session()->get('data');
        $user = $this->userModel->where('email', $session['email'])->get()->getResultArray()[0];

        // Get Price
        $price = $this->db->query('SELECT * FROM member_payment_price')->getResultArray();

        // Get Total Member
        $totalMember = $this->memberModel->findAll();

        // Get Female
        $femaleMember = $this->memberModel->where('gender', 'f')->get()->getResultArray();

        // Get Male
        $maleMember = $this->memberModel->where('gender', 'm')->get()->getResultArray();

        $data = [
            'user' => $user,
            'title' => 'Dashboard',
            'payment' => $this->get_all(),
            'price' => $price,
            'member' => [$totalMember, $femaleMember, $maleMember]
        ];

        // dd($data);

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
