<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        
        $expenses = \App\Expense::latest()->limit(10)->get(); 
        $incomes = \App\Income::latest()->limit(10)->get(); 

        return view('home', compact( 'expenses', 'incomes' ));
    }
}
