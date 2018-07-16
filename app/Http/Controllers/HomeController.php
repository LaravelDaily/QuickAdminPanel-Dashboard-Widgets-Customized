<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\WidgetsService;

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
    public function index(WidgetsService $widgetsService)
    {
        $expenses = \App\Expense::latest()->limit(10)->get(); 
        $incomes = \App\Income::latest()->limit(10)->get();
        $graphs = $widgetsService->getGraphs();

        return view('home', compact('expenses', 'incomes', 'graphs'));
    }
}
