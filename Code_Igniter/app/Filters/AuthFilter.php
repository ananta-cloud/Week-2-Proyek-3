<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        // Panggil service session
        $session = \Config\Services::session();

        // Jika session dengan key 'isLoggedIn' tidak ada atau nilainya false
        if (!$session->get('isLoggedIn')) {
            // Alihkan pengguna kembali ke halaman login
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
