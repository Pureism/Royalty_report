<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Royalty extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_royalty'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'slug'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'buku' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true,
			],
			'penulis' => [
				'type' => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'harga' => [
				'type' => 'INT',
				'constraint'     => '255',
				'null' => true,
			],
			'cetak' => [
				'type' => 'INT',
				'constraint'     => '255',
				'null' => true,
			],
			'total' => [
				'type' => 'INT',
				'constraint'     => '255',
				'null' => true,
			],
			'deskripsi' => [
				'type' => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'lampiran' => [
				'type' => 'VARCHAR',
				'constraint'     => '255',
				'null' => true,
			],
			'diubah' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'dibuat' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'id_editor' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
			'id_keuangan' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
			'id_order' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
			'id_buku' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_royalty', true);
		$this->forge->createTable('royalty');
	}

	public function down()
	{
		$this->forge->dropTable('royalty');
	}
}
