<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Editor extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_editor'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'TEXT',
				'constraint' => '255',
			],
			'tanggal_lahir' => [
				'type' => 'DATE',
				'null' => true,
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_editor', true);
		$this->forge->createTable('editor');
	}

	public function down()
	{
		$this->forge->dropTable('editor');
	}
}
