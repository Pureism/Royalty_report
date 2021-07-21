<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Naskah extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_naskah'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'judul'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'isi' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			],
			'id_editor' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_naskah', true);
		$this->forge->createTable('naskah');
	}

	public function down()
	{
		$this->forge->dropTable('naskah');
	}
}
