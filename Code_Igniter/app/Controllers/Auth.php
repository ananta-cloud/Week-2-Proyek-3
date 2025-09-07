<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Config\Services;

class Auth extends BaseController
{
    protected $session;
    protected $helpers = ['form', 'url'];
    public function __construct()
    {
        $this->session = Services::session();
    }

    public function login()
    {
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/template');
        }
        return view('template/login');
    }

    public function processLogin()
    {
        $validation = Services::validation();

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        
        // Jika validasi gagal
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new AdminModel(); 
        $username = $this->request->getPost('username'); 
        $password = $this->request->getPost('password');

        // Mencari user berdasarkan username
        $user = $model->where('username', $username)->first();

        // Cek user ditemukan dan verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            // Jika berhasil, set data session
            $sessionData = [
                'id'         => $user['id'], 
                'nama'       => $user['nama'],
                'username'   => $user['username'],
                'isLoggedIn' => TRUE
            ];
            $this->session->set($sessionData);
            
            return redirect()->to('/home');
        } else {
            // Jika login gagal
            $this->session->setFlashdata('error', 'Username atau Password salah.'); 
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        // Hapus semua data session
        $this->session->destroy();

        // $this->session->remove(['id', 'nama', 'username', 'isLoggedIn']);
        $this->session->setFlashdata('success', 'Anda berhasil logout.');
        // Redirect ke halaman login
        return redirect()->to('/');
    }
}

