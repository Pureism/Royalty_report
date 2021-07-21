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

            // Hitung Royalty
            $hargaBuku = rand(10000, 500000);
            $jumlahCetak = rand(50, 500);
            $totalRoyalty = $hargaBuku * $jumlahCetak / 100 * 10;

            $data = [
                'slug' => $slug,
                'buku'    => $faker->sentence,
                'penulis'    => $faker->firstName . ' ' . $faker->lastName,
                'harga' => $hargaBuku,
                'cetak' => $jumlahCetak,
                'total' => $totalRoyalty,
                'deskripsi' => $faker->paragraph(6),
                'lampiran' => 'lampiran' . rand(1, 10) . '.png',
                'diubah' => $datetime,
                'dibuat' => $datetime,
                'id_editor' => rand(1, 20),
                'id_keuangan' => rand(1, 20),
                'id_order' => rand(1, 20),
                'id_buku' => rand(1, 100)
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
