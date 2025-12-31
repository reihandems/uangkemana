<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
use App\Controllers\AuthController;

// LANDING PAGE
$routes->get('/', 'Page::landingPage');


// AUTENTIKASI - LOGIN
$routes->get('/login', 'Page::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

// AUTENTIKASI - REGISTER
$routes->get('/register', 'Auth::registerBuatAkun');
$routes->post('/register/akun-process', 'Auth::registerBuatAkunProcess');
$routes->get('/register/buat-dompet', 'Auth::registerBuatDompet');
$routes->post('/register/buat-dompet/dompet-process', 'Auth::registerBuatDompetProcess');


$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->post('/dashboard/store', 'Transaksi::store', ['filter' => 'auth']);

$routes->get('/transaksi', 'Transaksi::index', ['filter' => 'auth']);
$routes->get('/transaksi/data', 'Transaksi::data');
// Tambah Transaksi
$routes->post('/transaksi/store', 'Transaksi::store', ['filter' => 'auth']);


$routes->get('/transaksi/detail-transaksi/(:num)', 'Transaksi::detail/$1', ['filter' => 'auth']);
$routes->get('/transaksi/edit/(:num)', 'Transaksi::edit/$1');
$routes->post('/transaksi/update/(:num)', 'Transaksi::update/$1');
$routes->get('/transaksi/delete/(:num)', 'Transaksi::delete/$1');

$routes->get('/budget', 'Budget::index', ['filter' => 'auth']);
$routes->post('/budget/store', 'Budget::store', ['filter' => 'auth']);
$routes->post('/budget/update/(:num)', 'Budget::update/$1');
$routes->get('/budget/delete/(:num)', 'Budget::delete/$1');

$routes->get('/dompet', 'Dompet::index', ['filter' => 'auth']);
$routes->post('/dompet/store', 'Dompet::store', ['filter' => 'auth']);
$routes->post('/dompet/update/(:num)', 'Dompet::update/$1', ['filter' => 'auth']);
$routes->get('/dompet/delete/(:num)', 'Dompet::delete/$1', ['filter' => 'auth']);


$routes->get('/settings', 'Settings::index', ['filter' => 'auth']);
$routes->post('/settings/update/(:num)', 'Settings::update/$1', ['filter' => 'auth']);