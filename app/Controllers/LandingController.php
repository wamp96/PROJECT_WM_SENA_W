<?php

namespace App\Controllers;

class LandingController extends BaseController
{
    public function index()
    {
        return view('landing_page/landing_view'); // Asegúrate de que el archivo de vista esté en app/Views/
    }
}
