<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dosen extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip'        => '198503152010011001',
                'nama'       => 'Budi Santoso',
                'gender'     => 'Pria',
                'telp'       => '081234567890',
                'email'      => 'budi.santoso@example.com',
            ],
            [
                'nip'        => '199008202015022003',
                'nama'       => 'Citra Lestari',
                'gender'     => 'Wanita',
                'telp'       => '085678901234',
                'email'      => 'citra.lestari@example.com',
            ],
            [
                'nip'        => '198811012012121005',
                'nama'       => 'Agus Wijaya',
                'gender'     => 'Pria',
                'telp'       => '087712345678',
                'email'      => 'agus.wijaya@example.com',
            ],
            [
                'nip'        => '199205252018032002',
                'nama'       => 'Dewi Anggraini',
                'gender'     => 'Wanita',
                'telp'       => '081898765432',
                'email'      => 'dewi.anggraini@example.com',
            ],
        ];

        // Using Query Builder
        $this->db->table('dosen')->insertBatch($data);
    }
}