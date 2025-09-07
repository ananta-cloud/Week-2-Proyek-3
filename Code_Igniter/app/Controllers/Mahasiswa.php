<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->findAll()
        ];
        return view('mahasiswa/index', $data);
    }

    public function detail($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);
        if (empty($mahasiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa tidak ditemukan untuk ID: ' . $id);
        }
        $data = [
            'title'     => 'Detail Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];
        return view('mahasiswa/detail', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Tambah Data Mahasiswa',
        ];
        return view('mahasiswa/create', data: $data);
    }

    public function store()
    {
        $rules = [
            'nim'  => 'required|is_unique[mahasiswa.nim]',
            'nama' => 'required',
            'umur' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->mahasiswaModel->save([
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->find($id)
        ];
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nim'  => "required|is_unique[mahasiswa.nim,id,{$id}]",
            'nama' => 'required',
            'umur' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $this->mahasiswaModel->save([
            'id'   => $id,
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);
        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}

