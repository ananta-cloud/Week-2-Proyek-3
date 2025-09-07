<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- RUTE PUBLIK / AUTENTIKASI ---
// Rute-rute ini bisa diakses oleh siapa saja.
$routes->get('/', 'Auth::login');
$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::processLogin');
$routes->get('logout', 'Auth::logout');


// --- GRUP RUTE PRIVAT / TERPROTEKSI ---
// Semua rute di dalam grup ini akan otomatis menggunakan filter 'auth'.
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    // Halaman utama setelah login
    $routes->get('home', 'Home::index');

    // Rute untuk CRUD Mahasiswa
     $routes->get('mahasiswa', 'Mahasiswa::index');
     $routes->get('mahasiswa/detail/(:num)', 'Mahasiswa::detail/$1');
     $routes->get('mahasiswa/create', 'Mahasiswa::create');
     $routes->post('mahasiswa/store', 'Mahasiswa::store');
     $routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
     $routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
     $routes->post('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');

     // Rute untuk CRUD Mahasiswa
     $routes->get('dosen', 'Dosen::index');
     $routes->get('dosen/detail/(:num)', 'Dosen::detail/$1');
     $routes->get('dosen/create', 'Dosen::create');
     $routes->post('dosen/store', 'Dosen::store');
     $routes->get('dosen/edit/(:num)', 'Dosen::edit/$1');
     $routes->post('dosen/update/(:num)', 'Dosen::update/$1');
     $routes->post('dosen/delete/(:num)', 'Dosen::delete/$1');

    // Rute Berita (jika ada)
    $routes->get('berita', 'Berita::index');
});


//  $routes->get('mahasiswa', 'Mahasiswa::index');
//     $routes->get('mahasiswa/create', 'Mahasiswa::create');
//     $routes->post('mahasiswa/store', 'Mahasiswa::store');
//     $routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
//     $routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
//     $routes->post('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');