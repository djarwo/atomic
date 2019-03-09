<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');             
        $this->data['activeMenu']   = ['dashboard'];
        $this->data['setPageTitle'] = '';
    }

    public function index()
    {        
        $this->data['setPageTitle'] = 'Halaman Dashboard';
        return view('dashboard')->with('data',$this->data);
    }
}
