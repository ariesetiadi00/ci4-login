<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserSubMenu extends Migration
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
			'menu_id' => [
				'type' => 'INT',
				'constraint' => 11

			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'url' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'icon' => [
				'type' => 'VARCHAR',
				'constraint' => '255'

			],
			'is_active' => [
				'type' => 'INT',
				'constraint' => 1

			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('user_sub_menu');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user_sub_menu');
		//
	}
}
