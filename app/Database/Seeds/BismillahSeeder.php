<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BismillahSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $datetime = $faker->date('Y-m-d h:i:s');
            $slug = url_title($datetime, '');
            $data = [
                'slug' => $slug,
                'order' => rand(1, 500),
                'buku'    => $faker->sentence,
                'penulis'    => $faker->firstName . ' ' . $faker->lastName,
                'deskripsi' => $faker->paragraph(6),
                'dibuat' => $datetime,
                'diubah' => $datetime
            ];
            $this->db->table('bismillah')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO bismillah (nama, alamat, telepon) VALUES(:nama:, :alamat:, :telepon:)", $data);

        // Using Query Builder
        // $this->db->table('bismillah')->insert($data);
        // $this->db->table('bismillah')->insertBatch($data);
    }
}
