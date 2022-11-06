<?php

namespace App\Services;
use App\Charts\SampleChart;
use App\Models\Sale;

class ReportService
{
    public function revenueChart()
    {
        $chart = new SampleChart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4])->options(['backgroundColor' => 'orange']);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1])->options(['backgroundColor' => 'green']);
        $params['chart'] = $chart;
        $params['rs_id'] = Sale::get_lists();

        return $params;
    }
}
