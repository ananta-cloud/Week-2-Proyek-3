<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MahasiswaModel;

class Mahasiswa extends Controller
{
    public function index()
    {
        $mhs = new MahasiswaModel;
        $mahasiswa['title']     = 'Data Mahasiswa';
        $mahasiswa['getMahasiswa'] = $mhs->getMahasiswa();
        echo view('mahasiswa',$mahasiswa);
    }

    public function detail($id)
    {
    $model = new MahasiswaModel;
    $data['mahasiswa'] = $model->find($id);

    // Cek jika data tidak ditemukan
    if (empty($data['mahasiswa'])) {
        // Tampilkan halaman error 404 bawaan CodeIgniter
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan ID ' . $id . ' tidak ditemukan');
    }
    $data['title'] = 'Detail Mahasiswa: ' . $data['mahasiswa']['nama'];
    return view('detail', $data);
    }
    
    public function tambah()
    {
        echo view('insert');
    }

    public function edit($id)
    {
        $model = new MahasiswaModel;
        $getMahasiswa = $model->find($id);
        if(isset($getMahasiswa))
        {
            $data['mahasiswa'] = $getMahasiswa;
            // $data['title']  = 'Edit '.$getMahasiswa->nama;
            echo view('edit', $data);
        }else{
            return redirect()->to(base_url('/'))->with('error', "ID Mahasiswa {$id} Tidak Ditemukan");
    }}

    public function update()
    {
        $model = new MahasiswaModel;
        $id = $this->request->getPost('id');
        $data = [
            'nim'   => $this->request->getPost('nim'),
            'nama'  => $this->request->getPost('nama'),
            'umur'  => $this->request->getPost('umur')
        ];
        $model->editMahasiswa($data,$id);
        return redirect()->to(base_url('/'))->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

     public function add()
    {
        $model = new MahasiswaModel;
        $data = [
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];
        $model->insert($data);
        return redirect()->to(base_url('/'))->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function hapus($id)
    {
        $model = new MahasiswaModel;
        $getMahasiswa = $model->find($id);
        if(isset($getMahasiswa))
        {
            $model->delete($id);
            echo '<script>
                    alert("Hapus Data Barang Sukses");
                    window.location="'.base_url(relativePath: '/').'"
                </script>';
        }else{
            return redirect()->to(base_url('/'))->with('success', 'Hapus Gagal !, ID barang '.$id.' Tidak ditemukan');
        }
    }
    
}