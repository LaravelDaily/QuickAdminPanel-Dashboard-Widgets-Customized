<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function expenses()
    {
        $reportTitle = 'Expenses';
        $reportLabel = 'SUM';
        $chartType   = 'line';

        $grouped = Expense::get()->sortBy('created_at')->groupBy(function ($entry) {
            if ($entry->created_at instanceof Carbon) {
                return Carbon::parse($entry->created_at)->format('Y-m');
            }

            return Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format('Y-m');
        });

        // Generate last 12 months array
        $results = [];
        foreach (range(0, 11) as $i) {
            $month = Carbon::now()->subMonths($i)->format('Y-m'); 
            $results[$month] = $grouped[$month]->sum('amount') ?? 0;
        }

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

}
