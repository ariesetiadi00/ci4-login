<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAccess extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'menu_id' => [
				'type' => 'INT',
				'constrant' => 11
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('user_access_menu');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('user_access_menu');
	}
}
