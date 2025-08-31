<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Mahasiswa extends Seeder
{
	public function run()
	{
		// membuat data
		$data_mahasiswa = [
			[
				'nim' => '241511044',
				'nama'  => 'Agustine Hail',
				'umur' => '21'
			]
		];

		foreach($data_mahasiswa as $data){
			// insert semua data ke tabel
			$this->db->table(tableName: 'mahasiswa')->insert($data);
		}
		

	}
}