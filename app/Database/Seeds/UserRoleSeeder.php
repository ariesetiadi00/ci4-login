<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRoleSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'role' => 'Administrator'
			],
			[
				'role' => 'Member'
			]
		];
		$this->db->table('user_role')->insertBatch($data);
	}
}
