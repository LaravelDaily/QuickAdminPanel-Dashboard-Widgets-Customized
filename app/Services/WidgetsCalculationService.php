<?php

namespace App\Services;

use Carbon\Carbon;
use App\Income;
use App\Expense;

class WidgetsCalculationService
{
    private $incomeByMonth = [];
    private $expensesByMonth = [];
    private $format;

    public function __construct($format = 'Y-m')
    {
        $this->format = $format;
        $this->incomeByMonth = $this->modelByMonth(Income::class);
        $this->expensesByMonth = $this->modelByMonth(Expense::class);
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function totalProfitPerMonth()
    {
        $expensesPerMonth = $this->totalExpensesPerMonth();
        $incomePerMonth = $this->totalIncomePerMonth();

        foreach ($incomePerMonth as $month => $income) {
            $profitPerMonth[$month] = $income - $expensesPerMonth[$month];
        }

        return $profitPerMonth;
    }

    public function totalExpensesPerMonth()
    {
        return $this->totalPerMonth($this->expensesByMonth);
    }

    public function totalIncomePerMonth()
    {
        return $this->totalPerMonth($this->incomeByMonth);
    }

    private function totalPerMonth($months, $field = 'amount')
    {
        foreach ($months as $month => $items) {
            $totals[$month] = $items->sum($field);
        }

        return $totals;
    }

    // make sure every last 12 months has it's array
    private function modelByMonth($className)
    {
        $groupedModels = $this->groupByMonth($className);
        $result = [];

        foreach ($this->generateMonthsArray() as $month) {
            $result[$month] = $groupedModels[$month] ?? [];
        }

        return collect($result);
    }

    private function groupByMonth($className)
    {
        return $className::all()->groupBy(function ($entry) {
            if ($entry->created_at instanceof Carbon) {
                return Carbon::parse($entry->created_at)->format($this->format);
            }

            return Carbon::createFromFormat(config('app.date_format'), $entry->created_at)->format($this->format);
        }); 
    }

    private function generateMonthsArray()
    {
        foreach (range(0, 11) as $i) {
            $months[] = Carbon::now()->subMonth($i)->format($this->format);
        }

        return array_sort($months);
    }
}