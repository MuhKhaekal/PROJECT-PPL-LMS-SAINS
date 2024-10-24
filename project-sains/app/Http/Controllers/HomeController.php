<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            if (Auth::user()->role == 'admin'){
                return view('dashboard.admin.home-admin');
            } elseif(Auth::user()->role == 'asisten'){
                return view('dashboard.asisten.home-asisten');
            } else{
                return view('dashboard.user.home-user');
            }
        } else {
            return redirect('login');
        }
    }
}
