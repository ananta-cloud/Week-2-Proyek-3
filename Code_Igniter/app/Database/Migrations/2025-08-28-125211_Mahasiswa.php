<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		// Membuat kolom/field untuk tabel news
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nim'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '11'
			],
			'nama'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 25,
			],
			'umur' => [
				'type'           => 'INT',
				'constraint'           => 3,
			]
		]);

		// Membuat primary key
		$this->forge->addKey('id', primary: true);
        $this->forge->addKey('nim');
		// Membuat tabel mahasiswa
		$this->forge->createTable('mahasiswa', true);
	}

	public function down()
	{
		// menghapus tabel news
		$this->forge->dropTable(tableName: 'mahasiswa');
	}
}