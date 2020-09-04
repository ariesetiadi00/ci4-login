<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMenu extends Migration
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
			'menu' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('user_menu');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('user_menu');
	}
}
