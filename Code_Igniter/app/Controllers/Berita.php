<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Berita extends BaseController
{
   public function index(): string
    {
        $data= [
            'title'=> 'Berita',
        ];
        return view('template/berita',$data);
    }
}
