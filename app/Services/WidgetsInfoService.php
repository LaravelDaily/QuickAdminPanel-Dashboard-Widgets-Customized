<?php

namespace App\Services;

use Carbon\Carbon;

class WidgetsInfoService
{
    private $calculationService;

    public function __construct(WidgetsCalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function getData()
    {
        return [
            'currentMonthExpenses' => $this->currentMonthExpenses(),
            'currentMonthIncome' => $this->currentMonthIncome(),
            'currentYearExpenses' => $this->currentYearExpenses(),
            'currentYearIncome' => $this->currentYearIncome(),
        ];
    }

    private function currentMonthExpenses()
    {
        return $this->calculationService->totalExpensesPerMonth()[$this->getCurrentMonth()] ?? 0;
    }

    private function currentMonthIncome()
    {
        return $this->calculationService->totalIncomePerMonth()[$this->getCurrentMonth()] ?? 0;
    }

    private function currentYearExpenses()
    {
        return $this->spliceThisYearRecords($this->calculationService->totalExpensesPerMonth())
                ->sum();
    }

    private function currentYearIncome()
    {
        return $this->spliceThisYearRecords($this->calculationService->totalIncomePerMonth())
            ->sum();
    }

    private function spliceThisYearRecords($array)
    {
        $firstMonthOfTheYear = $this->getCurrentYearFirstMonth();

        foreach ($array as $month => $value) {
            if ($month >= $firstMonthOfTheYear) {
                $records[$month] = $array[$month];
            }
        }

        return collect($records);
    }

    private function getCurrentYearFirstMonth()
    {
        return Carbon::now()->startOfYear()->format($this->calculationService->getFormat());
    }

    private function getCurrentMonth()
    {
        return Carbon::now()->format($this->calculationService->getFormat());
    }
}