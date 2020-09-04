<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAccessSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'role_id' => 1,
				'menu_id' => 1
			],
			[
				'role_id' => 1,
				'menu_id' => 2
			],
			[
				'role_id' => 2,
				'menu_id' => 2
			],
			[
				'role_id' => 1,
				'menu_id' => 3
			],
			[
				'role_id' => 2,
				'menu_id' => 4
			],
			[
				'role_id' => 1,
				'menu_id' => 4
			]
		];
		$this->db->table('user_access_menu')->insertBatch($data);
	}
}
