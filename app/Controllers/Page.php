<?php

namespace App\Controllers;

class Page extends BaseController {
    // LOGIN
    public function login() {
        return view('auth/login');
    }
}