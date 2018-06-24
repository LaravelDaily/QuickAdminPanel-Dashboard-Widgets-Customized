<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;

class ReportsController extends Controller
{
    public function expenses()
    {
        $reportTitle = 'Expenses';
        $reportLabel = 'SUM';
        $chartType   = 'line';

        $results = Expense::get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->created_at)->format('Y-m');
            }

            return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m');
        })->map(function ($entries, $group) {
            return $entries->sum('amount');
        });

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

}
