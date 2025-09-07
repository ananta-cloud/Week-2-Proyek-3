<?php
namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nim', 'nama', 'umur'];

    // // Vers Manual
    // public function getMahasiswa(): array
    // {
    //     $db = \Config\Database::connect();
    //     $query = $db->query("SELECT * FROM mahasiswa");
    //     return $query->getResultArray();
    // }
    // public function saveMahasiswa(array $data): bool
    // {
    //     // Pastikan data yang dibutuhkan ada
    //     if (empty($data['nim']) || empty($data['nama']) || empty($data['umur'])) {
    //         return false;
    //     }
    //     $insert = "INSERT INTO {$this->table} (nim, nama, umur) VALUES (?, ?, ?)";
    //     return $this->db->query($insert, [
    //         $data['nim'],
    //         $data['nama'],
    //         $data['umur']
    //     ]);
    // }
    //  public function editMahasiswa(array $data,int $id):Bool
    // {
    //     // Pastikan semua data yang dibutuhkan ada
    //     if (empty($id) || empty($data['nim']) || empty($data['nama']) || empty($data['umur'])) {
    //         return false;
    //     }
    //     $update = "UPDATE {$this->table} SET nim = ?, nama = ?, umur = ? WHERE id = ?";
        
    //     // Menjalankan query dengan data yang aman (binding)
    //     return $this->db->query($update, [
    //         $data['nim'],
    //         $data['nama'],
    //         $data['umur'],
    //         $id
    //     ]);
    // }

    // // versi cari simple
    // // public function getMahasiswa($id = false)
    // // {
    // //     return ($id === false) ? $this->findAll() : $this->find($id);
    // // }
    // // public function saveMahasiswa($mhs){

    // //     $input =  $this->db->table( $this->table);
    // //     return $input->insert($mhs);
    // // }
    // //  public function editMahasiswa($data,$id)
    // // {
    // //     $edit = $this->db->table($this->table);
    // //     $edit->where('id', $id);
    // //     return $edit->update($data);
    // // }

}

?>