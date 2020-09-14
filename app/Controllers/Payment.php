
<?php

switch

namespace App\Controllers;

class Payment extends BaseController
{
    public function index()
    {

        // Database = [id, member_id, pay_desc, date_time, amount]
        $data = [
            'member_id' => $this->request->getVar('id'),
            'month' => $this->time->getMonth(),
            'amount' => 400000,
            'created_at' => $this->time->now()
        ];

        // Save Data

        $this->db->table('member_payment')->insert($data);

        session()->setFlashData('strong', 'Payment');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member');
    }
}
