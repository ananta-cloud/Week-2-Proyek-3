<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Dosen extends BaseController
{
    public function display(): string
    {
        return view(name: 'hello_world');
    }

    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Dosen',
            'dosen' => $this->dosenModel->findAll()
        ];
        return view('dosen/index', $data);
    }

    public function detail($id)
    {
        $dosen = $this->dosenModel->find($id);
        if (empty($dosen)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data dosen tidak ditemukan untuk ID: ' . $id);
        }
        $data = [
            'title'     => 'Detail dosen',
            'dosen' => $dosen
        ];
        return view('dosen/detail', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Tambah Data dosen',
        ];
        return view('dosen/create', data: $data);
    }

    public function store()
    {
        $rules = [
            'nim'  => 'required|is_unique[dosen.nip]',
            'nama' => 'required',
            'gender' => 'required',
            'telp' => 'required',
            'email' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->dosenModel->save([
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/dosen')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Data dosen',
            'dosen' => $this->dosenModel->find($id)
        ];
        return view('dosen/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nip'  => "required|is_unique[dosen.nip,id,{$id}]",
            'nama' => 'required',
            'gender' => 'required',
            'telp' => 'required',
            'email' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $this->dosenModel->save([
            'id'   => $id,
            'nip'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost( 'gender'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),

        ]);

        return redirect()->to('/dosen')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->dosenModel->delete($id);
        return redirect()->to('/dosen')->with('success', 'Data dosen berhasil dihapus.');
    }
}
