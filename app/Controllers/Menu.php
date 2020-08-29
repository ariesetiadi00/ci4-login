<?php

namespace App\Controllers;

use App\Models\UserModel;

class Menu extends BaseController
{
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
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
            'title' => 'Menu Management',
            'menu' => $this->db->query("SELECT * FROM user_menu")->getResultArray()
        ];
        return view('menu/index', $data);
    }
}
