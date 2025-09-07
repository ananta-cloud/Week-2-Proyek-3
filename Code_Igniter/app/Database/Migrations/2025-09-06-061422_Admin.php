<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up(){
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
             'nama'=>[
                'type' => 'VARCHAR',
                'constraint' => '25',
            ],
			'username'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '11',
                'unique'        => true,
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
            ],
		]);

		// Membuat primary key
		$this->forge->addKey('id', primary: true);
		// Membuat tabel mahasiswa
		$this->forge->createTable('admin', true);
	}

	public function down()
	{
		$this->forge->dropTable( 'admin');
	}
}
