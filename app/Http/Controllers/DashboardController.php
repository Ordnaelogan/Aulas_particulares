<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Esta linha carrega o arquivo resources/views/dashboard.blade.php
        return view('dashboard'); 
    }
}