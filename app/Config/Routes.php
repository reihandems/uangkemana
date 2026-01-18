<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
use App\Controllers\AuthController;

// LANDING PAGE
$routes->get('/', 'Page::landingPage');
$routes->get('/tentang', 'Page::landingPageTentang');


// AUTENTIKASI - LOGIN
$routes->get('/login', 'Page::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

// AUTENTIKASI - REGISTER
$routes->get('/register', 'Auth::registerBuatAkun');
$routes->post('/register/akun-process', 'Auth::registerBuatAkunProcess');
$routes->get('/register/buat-dompet', 'Auth::registerBuatDompet');
$routes->post('/register/buat-dompet/dompet-process', 'Auth::registerBuatDompetProcess');

$routes->group('user', ['filter' => 'role:user'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->post('dashboard/store', 'Transaksi::store');
    
    $routes->get('transaksi', 'Transaksi::index');
    $routes->get('transaksi/data', 'Transaksi::data');
    // Tambah Transaksi
    $routes->post('transaksi/store', 'Transaksi::store');
    
    
    $routes->get('transaksi/detail-transaksi/(:num)', 'Transaksi::detail/$1');
    $routes->get('transaksi/edit/(:num)', 'Transaksi::edit/$1');
    $routes->post('transaksi/update/(:num)', 'Transaksi::update/$1');
    $routes->get('transaksi/delete/(:num)', 'Transaksi::delete/$1');
    
    $routes->get('budget', 'Budget::index');
    $routes->post('budget/store', 'Budget::store');
    $routes->post('budget/update/(:num)', 'Budget::update/$1');
    $routes->get('budget/delete/(:num)', 'Budget::delete/$1');
    
    $routes->get('dompet', 'Dompet::index');
    $routes->post('dompet/store', 'Dompet::store');
    $routes->post('dompet/update/(:num)', 'Dompet::update/$1');
    $routes->get('dompet/delete/(:num)', 'Dompet::delete/$1');
    
    
    $routes->get('settings', 'Settings::index');
    $routes->post('settings/update/(:num)', 'Settings::update/$1');
});