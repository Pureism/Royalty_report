<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penulis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_penulis'          => [
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
			'id_editor' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_penulis', true);
		$this->forge->createTable('penulis');
	}

	public function down()
	{
		$this->forge->dropTable('penulis');
	}
}
