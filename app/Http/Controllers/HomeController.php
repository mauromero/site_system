<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('isUser') && Gate::denies('isAdmin')){
            abort(404,"Not Authorized");
        }
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
