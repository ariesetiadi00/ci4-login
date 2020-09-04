<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserMenuSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'menu' => 'Admin'
			],
			[
				'menu' => 'Member'
			],
			[
				'menu' => 'Menu'
			],
			[
				'menu' => 'Sign Out'
			]
		];
		$this->db->table('user_menu')->insertBatch($data);
	}
}
