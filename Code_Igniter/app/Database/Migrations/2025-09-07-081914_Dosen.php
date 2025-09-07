<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
	public function up()
	{
		$this->forge->addField([
        'id'          => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
        ],
        'nip'         => [
        'type'       => 'VARCHAR',
        'constraint' => '20', 
        ],
        'nama'        => [
        'type'       => 'VARCHAR',
        'constraint' => '100', 
        ],
        'gender'      => [
        'type'       => 'ENUM',
        'constraint' => ['Pria', 'Wanita'],
        'null'       => false,
        ],
        'telp'        => [
        'type'       => 'VARCHAR',
        'constraint' => '15', // Nomor telepon biasanya tidak lebih dari 15 digit
        ],
        'email'       => [
        'type'       => 'VARCHAR',
        'constraint' => '100',
        ],
    ]);

    // Membuat primary key
		$this->forge->addKey('id', primary: true);
		// Membuat tabel mahasiswa
		$this->forge->createTable('dosen', true);
	}

	public function down()
	{
		// menghapus tabel news
		$this->forge->dropTable('dosen');
	}
}