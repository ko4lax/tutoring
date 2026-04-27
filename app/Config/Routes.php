<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public pages
$routes->get('/', 'Home::utama');
$routes->get('/bimbel', 'Home::utama');
$routes->get('/daftar', 'Home::daftar');
$routes->get('/daftar-kelas', 'Home::daftarKelas');

// Auth — login view rendered by Auth::login, form posts to Auth::prosesLogin
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// Admin self-registration (protected by secret env var)
$routes->get('/register', 'Auth::login'); // placeholder — actual register page not built yet
$routes->post('/register', 'Auth::register');

// Admin dashboard and actions
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/pendaftar', 'Admin::pendaftar');
$routes->get('/admin/pengajar', 'Admin::pengajar');
$routes->get('/admin/program', 'Admin::program');
$routes->post('/admin/simpanPengajar', 'Admin::simpanPengajar');
$routes->post('/admin/updatePengajar/(:num)', 'Admin::updatePengajar/$1');
$routes->get('/admin/hapusPengajar/(:num)', 'Admin::hapusPengajar/$1');
$routes->post('/admin/simpanPendaftar', 'Admin::simpanPendaftar');
$routes->post('/admin/pendaftar/simpan', 'Admin::simpanPendaftar');
$routes->post('/admin/pendaftar/update/(:num)', 'Admin::updatePendaftar/$1');
$routes->get('/admin/pendaftar/hapus/(:num)', 'Admin::hapusPendaftar/$1');
$routes->post('/admin/program/simpan', 'Admin::simpanProgram');
$routes->post('/admin/program/update/(:num)', 'Admin::updateProgram/$1');
$routes->get('/admin/program/hapus/(:num)', 'Admin::hapusProgram/$1');

// Public registration — homepage wizard
$routes->post('/pendaftaran/umum', 'Home::simpanPendaftarUmum');

// Public standalone registration form
$routes->post('/daftar/simpan', 'Admin::simpanPendaftar');
