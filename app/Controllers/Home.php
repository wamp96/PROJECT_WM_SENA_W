<?php

namespace App\Controllers;

class Home extends Controller
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
