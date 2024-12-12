<?php

namespace App\Charts;

use App\Models\Faculty;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\LarapexChart\LineChart;
use SebastianBergmann\FileIterator\Facade;

class Chart2
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function buildLine()
    {
        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->setDataset('Physical sales', [40, 93, 35, 42, 18, 82])
            ->setDataset('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
    
}