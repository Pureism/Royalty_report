<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DivProduksi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_produksi'          => [
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
		$this->forge->addKey('id_produksi', true);
		$this->forge->createTable('div_produksi');
	}

	public function down()
	{
		$this->forge->dropTable('div_produksi');
	}
}
