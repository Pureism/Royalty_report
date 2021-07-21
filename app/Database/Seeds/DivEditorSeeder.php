<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DivEditorSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'nama'    => $faker->firstName . ' ' . $faker->lastName,
                'tanggal_lahir' => $faker->date,
                'alamat' => $faker->address,
                'id_penulis' => rand(1, 20),
                'id_naskah' => rand(1, 100)
            ];
            $this->db->table('div_editor')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO bismillah (nama, alamat, telepon) VALUES(:nama:, :alamat:, :telepon:)", $data);

        // Using Query Builder
        // $this->db->table('bismillah')->insert($data);
        // $this->db->table('bismillah')->insertBatch($data);
    }
}
