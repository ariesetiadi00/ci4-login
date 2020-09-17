<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Member extends BaseController
{
    protected $memberModel;
    protected $userModel;
    protected $time;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->userModel = new UserModel();
        $this->time = new Time();
    }
    public function index()
    {

        $id = session()->get('data')['user_id'];

        $user = $this->userModel->find($id);

        $member = $this->memberModel->findAll();


        $data = [
            'title' => 'Member',
            'member' => $member,
            'user' => $user,
            'time' => $this->time->getMonth(),
            'db' => $this->db
        ];
        return view('member/index', $data);
    }
    public function create()
    {
        $name = $this->request->getVar('name');

        $this->memberModel->save([
            'name' => $name,
            'created_at' => $this->time::now(),
            'updated_at' => $this->time::now()
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
        $time = $this->time->getMonth();

        // Select one member detail
        $query_1 = "SELECT * FROM member WHERE id = $id";

        // Select member that have paid on this month
        $query_2 = "SELECT * FROM member 
                    INNER JOIN member_payment 
                    ON member.id = member_payment.member_id 
                    WHERE member.id = $id 
                    AND member_payment.month = $time";
        // Select all this member  payment history
        $query_3 = "SELECT * FROM member_payment
                    WHERE member_payment.member_id = $id";

        $member = $this->db->query($query_1)->getResultArray();
        $status = $this->db->query($query_2)->getResultArray();
        $history = $this->db->query($query_3)->getResultArray();


        echo json_encode(array('member' => $member, 'status' => $status, 'history' => $history));
    }
}
