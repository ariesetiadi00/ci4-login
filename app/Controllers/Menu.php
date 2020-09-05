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
    public function add()
    {
        $menu = [
            'menu' => $this->request->getVar()
        ];
        $this->db->table('user_menu')->insert($menu);
        session()->setFlashData('strong', 'Insert');
        session()->setFlashData('message', 'Success');
        return redirect()->to('/menu/index');
    }

    public function delete($id)
    {
        $this->db->table('user_menu')->where('id', $id)->delete();
        session()->setFlashData('strong', 'Delete');
        session()->setFlashData('message', 'Success');
        return redirect()->to('/menu/index');
    }
}
