<?php
namespace App\Http\Utils;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class Charts
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        return $this->chart->barChart()
            ->setTitle('Pilihan 1 vs Pilihan 2')
            ->setSubtitle('Pilkada 2024')
            ->setColors(['#FFC107'])
            ->addData('Suara', [200, 300])
            // ->addData('Pilihan 2', [300])
            ->setXAxis(['Pilihan 1', 'Pilihan 2']);
    }
}
