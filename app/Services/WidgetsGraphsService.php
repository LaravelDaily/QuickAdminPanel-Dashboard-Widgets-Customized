<?php

namespace App\Services;

class WidgetsGraphsService
{
    protected $calculationService;

    public function __construct(WidgetsGraphsCalculationService $calculationService)
    {
        $this->calculationService = $calculationService;   
    }

    public function getGraphs()
    {
        return [
            'profit'   => $this->getProfitData(),
            'expenses' => $this->getExpensesData()
        ];
    }

    private function getExpensesData()
    {
        $reportTitle = 'Expenses';
        $reportLabel = 'SUM';
        $chartType   = 'line';
        $results     = $this->calculationService->totalExpensesPerMonth();

        return compact('reportTitle', 'results', 'chartType', 'reportLabel');
    }

    private function getProfitData()
    {
        $reportTitle = 'Profit';
        $reportLabel = 'SUM';
        $chartType   = 'line';
        $results     = $this->calculationService->totalProfitPerMonth();

        return compact('reportTitle', 'results', 'chartType', 'reportLabel'); 
    }
}