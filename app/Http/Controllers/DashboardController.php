<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function home()
    {
        //$user = Auth::user();
        $user = 'Nguyễn Hoài Phúc';
        return view('admin.index', ['user'=>$user]);
    }
}
