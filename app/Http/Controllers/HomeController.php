<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Http\Requests;
use App\Income;
use App\Services\WidgetsInfoService;
use App\Services\WidgetsGraphsService;

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
     * @param WidgetsGraphsService $widgetsGraphsService
     * @param WidgetsInfoService $widgetsInfoService
     * @return \Illuminate\Http\Response
     */
    public function index(WidgetsGraphsService $widgetsGraphsService, WidgetsInfoService $widgetsInfoService)
    {
        $expenses = Expense::latest()->limit(10)->get();
        $incomes = Income::latest()->limit(10)->get();
        $graphs = $widgetsGraphsService->getGraphs();
        $infoData = $widgetsInfoService->getData();

        return view('home', compact('expenses', 'incomes', 'graphs', 'infoData'));
    }
}
