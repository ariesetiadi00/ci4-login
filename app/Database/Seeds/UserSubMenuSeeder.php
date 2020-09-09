<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSubMenuSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'menu_id' => 1,
				'title' => 'Dashboard',
				'url' => 'admin',
				'icon' => 'fas fa-fw fa-tachometer-alt',
				'is_active' => 1
			],
			[
				'menu_id' => 2,
				'title' => 'Profile',
				'url' => 'user',
				'icon' => 'fas fa-fw fa-user',
				'is_active' => 1
			],
			[
				'menu_id' => 2,
				'title' => 'Member',
				'url' => 'member',
				'icon' => 'fas fa-fw fa-users',
				'is_active' => 1
			],
			[
				'menu_id' => 3,
				'title' => 'Sign Out',
				'url' => 'auth/logout',
				'icon' => 'fas fa-sign-out-alt',
				'is_active' => 1
			]
		];
		$this->db->table('user_sub_menu')->insertBatch($data);
	}
}
