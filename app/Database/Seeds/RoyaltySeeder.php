<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RoyaltySeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $datetime = $faker->date('Y-m-d h:i:s');
            $slug = url_title($datetime, '');
            $data = [
                'slug' => $slug,
                'orders' => rand(1, 500),
                'buku'    => $faker->sentence,
                'penulis'    => $faker->firstName . ' ' . $faker->lastName,
                'deskripsi' => $faker->paragraph(6),
                'cetak' => rand(100, 5000),
                'total' => rand(1000, 8000000),
                'lampiran' => 'lampiran' . rand(1, 6) . '.png',
                'dibuat' => $datetime,
                'diubah' => $datetime,
                'id_editor' => rand(1, 20),
                'id_keuangan' => rand(1, 20),
                'id_order' => rand(1, 20),
                'id_buku' => rand(1, 20)
            ];
            $this->db->table('royalty')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO bismillah (nama, alamat, telepon) VALUES(:nama:, :alamat:, :telepon:)", $data);

        // Using Query Builder
        // $this->db->table('bismillah')->insert($data);
        // $this->db->table('bismillah')->insertBatch($data);
    }
}
