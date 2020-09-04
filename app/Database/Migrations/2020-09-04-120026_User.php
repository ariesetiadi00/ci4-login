<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'gender' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => 11

			],
			'is_active' => [
				'type' => 'INT',
				'constraint' => 1

			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('user');
	}
}
