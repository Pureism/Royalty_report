<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_order'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'deksripsi'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'jumlah' => [
				'type' => 'INT',
				'null' => true,
				'constraint' => '255',
			],
			'dibuat' => [
				'type' => 'DATE',
				'null' => true,
			],
			'id_buku' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
			'id_produksi' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
			'id_editor' => [
				'type' => 'INT',
				'constraint'     => '11',
				'null' => true,
			],
		]);
		$this->forge->addKey('id_order', true);
		$this->forge->createTable('orders');
	}

	public function down()
	{
		$this->forge->dropTable('orders');
	}
}
