<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('inicio');
    }


        public function login(): string
    {
        return view('login');
    }

    public function registro(): string
    {
        return view('registro');
    }
}
