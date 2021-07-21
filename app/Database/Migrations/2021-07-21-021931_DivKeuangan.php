<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DivKeuangan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_keuangan'          => [
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
		$this->forge->addKey('id_keuangan', true);
		$this->forge->createTable('div_keuangan');
	}

	public function down()
	{
		$this->forge->dropTable('div_keuangan');
	}
}
