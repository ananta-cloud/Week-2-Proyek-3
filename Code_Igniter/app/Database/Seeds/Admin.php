<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            'nama'     => 'Administrator',
            'username' => 'admin',
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ];

        // Hapus admin lama jika ada, lalu insert yang baru
        $this->db->table('admin')->where('username', 'admin')->delete();
        $this->db->table('admin')->insert($data);
    }
}