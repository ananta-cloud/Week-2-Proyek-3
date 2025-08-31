<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Latihan1 extends BaseController
{
	public function index()
	{
        $data['title']  = 'Hallo Dunia !';
        $data['msg']    = 'Hello World';
		return view('hello_world',$data);
	}
}