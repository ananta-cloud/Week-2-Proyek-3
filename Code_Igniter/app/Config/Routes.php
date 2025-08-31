<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Index::index');

$routes->get('/', 'Mahasiswa::index'); 

//Halaman detail
$routes->get('mahasiswa/detail/(:num)', 'Mahasiswa::detail/$1');

// Halaman Tambah
$routes->get('mahasiswa/tambah', 'Mahasiswa::tambah');

// Halaman Edit
$routes->get('mahasiswa/edit/(:any)', 'Mahasiswa::edit/$1');

// Proses CRUD
$routes->post('mahasiswa/add', 'Mahasiswa::add');
$routes->post('mahasiswa/update', 'Mahasiswa::update');

// Hapus
$routes->get('mahasiswa/hapus/(:any)', 'Mahasiswa::hapus/$1');

?>