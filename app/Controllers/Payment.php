<?php

namespace App\Controllers;

class Payment extends BaseController
{

    protected $price, $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->price = $this->db->query("SELECT * FROM member_payment_price")->getResultArray()[0]['price'];
    }

    public function index()
    {
        // Database = [id, member_id, pay_desc, date_time, amount]
        $data = [
            'member_id' => $this->request->getVar('id'),
            'month' => $this->request->getVar('month'),
            'amount' => $this->price,
            'created_at' => $this->time->now('Asia/Shanghai')
        ];
        // Save Data

        $this->db->table('member_payment')->insert($data);

        session()->setFlashData('strong', 'Payment');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member/detail/' . $data['member_id']);
    }
    public function price()
    {
        // Prepare Array to Update
        $data = [
            'id' => $this->request->getVar('price-id'),
            'price' => $this->request->getVar('new-price'),
            'updated_at' => $this->time->now('Asia/Shanghai')
        ];

        // Update database
        $this->db->table('member_payment_price')->update($data);

        // Redirect to admin dashboard
        return redirect()->to('/admin');
    }
}
