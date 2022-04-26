<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   function __construct(){
        $this->middleware('auth');
   }

   function admin(){
       $this->middleware('role',['role'=>'admin']);
        return view('admin');
   }

    function index(){
       return view('profile',['user'=>Auth::user()]);
   }
}
