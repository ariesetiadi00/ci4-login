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
    protected $user;
    public static $sdb;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->userModel = new UserModel();
        $this->time = new Time();
        self::$sdb = \Config\Database::connect();

        // Get User Account
        $id = session()->get('data')['user_id'];
        $this->user = $this->userModel->find($id);
    }

    public function index()
    {
        // $member = $this->memberModel->findAll();
        $member = $this->memberModel->getAll();

        $data = [
            'title' => 'Member',
            'member' => $member,
            'user' => $this->user,
            'time' => $this->time->getMonth('Asia/Shanghai'),
            'db' => $this->db
        ];

        // dd($data);

        return view('member/index', $data);
    }

    public function create()
    {
        // Variable Initial
        $data = [
            'title' => 'New Member',
            'user' => $this->user,
            'time' => $this->time->getMonth(),
            'db' => $this->db
        ];
        // If empty, redirect to create page.
        return view('member/create', $data);
    }

    public function insert()
    {
        // Get Image
        $image = $this->request->getFile('foto');
        // Get Gender for checking image
        $gender = $this->request->getVar('gender');

        // If no image uploaded, use default image
        if ($image->getError() == 4) {
            if ($gender == 'm') {
                // Male default
                $img_name = 'd-male.png';
            } elseif ($gender == 'f') {
                // Female default
                $img_name = 'd-female.png';
            }
        } else {
            // File Name
            $img_name = $image->getName();
            // Move File to public/img
            $image->move('img/profile');
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'birth_place' => $this->request->getVar('birth_place'),
            'birth_date' => $this->request->getVar('birth_date'),
            'religion' => $this->request->getVar('religion'),
            'phone' => $this->request->getVar('phone'),
            'gender' => $gender,
            'image' => $img_name,
            'created_at' => $this->time->now('Asia/Shanghai'),
            'updated_at' => $this->time->now('Asia/Shanghai')
        ];

        $this->memberModel->save($data);

        session()->setFlashData('strong', 'Insert');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member/index');
    }

    public function edit($id)
    {
        // Get Member detail
        $member = $this->memberModel->find($id);
        // Get religion and gender to looping the form
        $religion = $this->db->query("SELECT * FROM member_religion")->getResultArray();
        $gender = $this->db->query("SELECT * FROM member_gender")->getResultArray();

        /// Variable Initial
        $data = [
            'title' => 'Edit Member',
            'user' => $this->user,
            'time' => $this->time->getMonth(),
            'db' => $this->db,
            'member' => $member,
            'religion' => $religion,
            'gender' => $gender
        ];
        // If empty, redirect to create page.
        return view('member/edit', $data);
    }

    public function update()
    {
        // Prepare array data
        $data = [
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'birth_place' => $this->request->getVar('birth_place'),
            'birth_date' => $this->request->getVar('birth_date'),
            'religion' => $this->request->getVar('religion'),
            'phone' => $this->request->getVar('phone'),
            'gender' => $this->request->getVar('gender'),
            'image' => $this->request->getVar('image'),
            'updated_at' => $this->time->now('Asia/Shanghai')
        ];

        $this->memberModel->save($data);

        session()->setFlashData('strong', 'Update');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member/index');
    }

    public function delete()
    {
        // Get POST Data
        $id = (int)$this->request->getVar('delete-id');

        // If ON, delete history
        if ($this->request->getVar('delete-check') == 'on') {
            // Delete history
            $this->db->table('member_payment')->delete(['member_id' => $id]);
        }

        // Delete
        // $this->memberModel->delete($id);
        $this->db->table('member')->delete(['id' => $id]);

        // Redirect
        session()->setFlashData('strong', 'Delete');
        session()->setFlashData('message', 'Success');

        return redirect()->to('/member/index');
    }

    public function detail($id)
    {
        $member = $this->get($id);

        /// Variable Initial    
        $data = [
            'title' => 'Edit Member',
            'user' => $this->user,
            'time' => $this->time->getMonth('Asia/Shanghai'),
            'member' => $member[0][0],
            'status' => $member[1],
            'history' => $member[2],
            'db' => $this->db
        ];

        // If Not Paid
        if (!$data['status']) {

            // Insert PAyment Debt
            $debt = [
                'member_id' => $data['member']['id'],
                'month' => $data['time'],
                'created_at' => $this->time->now('Asia/Shanghai')
            ];

            // Get Debt History
            $builder = $this->db->table('member_payment_debt');
            $debt_data = $builder->where([
                'member_id' => $debt['member_id'],
                'month' => $debt['month']
            ])->get()->getResultArray();

            // If debt not exist, insert debt
            if (!$debt_data) {
                $this->db->table('member_payment_debt')->insert($debt);
            }
        }

        // If empty, redirect to create page.
        return view('member/detail', $data);
    }

    public function get($id)
    {
        // $id = $_POST['id'];
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
                    WHERE member_payment.member_id = $id
                    ORDER BY member_payment.id DESC";

        $member = $this->db->query($query_1)->getResultArray();
        $status = $this->db->query($query_2)->getRowArray();
        $history = $this->db->query($query_3)->getResultArray();

        $data = [$member, $status, $history];
        // echo json_encode(array('member' => $member, 'status' => $status, 'history' => $history));
        return $data;
    }

    public function get_member()
    {

        $data = [
            // Get All Member
            'member' => $this->db->table('member')->get()->getResultArray(),
            // Get Female
            'female' => $this->db->table('member')->where('gender', 'f')->get()->getResultArray(),
            // Get Male
            'male' => $this->db->table('member')->where('gender', 'm')->get()->getResultArray()

        ];

        // Return Data Member
        echo json_encode($data);
    }

    public static function get_status($month, $id)
    {
        $query = "SELECT * FROM member
                INNER JOIN member_payment
                ON member.id = member_payment.member_id
                WHERE member.id = $id
                AND member_payment.month = $month";


        $status = self::$sdb->query($query)->getResultArray();
        return $status;
    }
}
