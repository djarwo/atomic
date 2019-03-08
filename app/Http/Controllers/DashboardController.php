<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->activeMenu = ['dashboard'];
    }

    public function index()
    {                
        return view('dashboard');
    }
}
