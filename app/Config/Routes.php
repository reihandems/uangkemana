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

$routes->get('/home', function() {
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
    return view('pages/view_home');
});

$routes->get('/home', 'Page::home');