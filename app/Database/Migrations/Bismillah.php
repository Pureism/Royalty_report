<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bismillah extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'telepon' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'created' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('bismillah');
	}

	public function down()
	{
		$this->forge->dropTable('bismillah');
	}
}
