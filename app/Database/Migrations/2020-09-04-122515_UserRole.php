<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRole extends Migration
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
			'role' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('user_role');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('user_role');
	}
}
