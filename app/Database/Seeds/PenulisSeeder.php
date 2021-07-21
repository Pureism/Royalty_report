<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PenulisSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'nama'    => $faker->firstName . ' ' . $faker->lastName,
                'tanggal_lahir' => $faker->date,
                'alamat' => $faker->address,
                'id_editor' => rand(1, 20)
            ];
            $this->db->table('penulis')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO bismillah (nama, alamat, telepon) VALUES(:nama:, :alamat:, :telepon:)", $data);

        // Using Query Builder
        // $this->db->table('bismillah')->insert($data);
        // $this->db->table('bismillah')->insertBatch($data);
    }
}
