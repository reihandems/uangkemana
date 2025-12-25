<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
use App\Controllers\AuthController;

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
$routes->get('/transaksi', 'Page::transaksi', ['filter' => 'auth']);
$routes->get('/transaksi/detail-transaksi', 'Page::transaksiDetail', ['filter' => 'auth']);
$routes->get('/budget', 'Page::budget', ['filter' => 'auth']);
$routes->get('/budget/detail-budget', 'Page::budgetDetail', ['filter' => 'auth']);
$routes->get('/dompet', 'Page::dompet', ['filter' => 'auth']);
$routes->get('/settings', 'Page::settings', ['filter' => 'auth']);