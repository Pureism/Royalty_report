<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_buku'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'judul'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'harga' => [
				'type' => 'INT',
				'constraint' => '255',
				'null' => true,
			],
			'id_penulis' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_buku', true);
		$this->forge->createTable('buku');
	}

	public function down()
	{
		$this->forge->dropTable('buku');
	}
}
