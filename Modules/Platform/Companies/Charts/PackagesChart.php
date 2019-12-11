<?php

namespace Modules\Platform\Companies\Charts;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


/**
 * Class PackagesChart
 * @package Modules\Platform\Companies\Charts
 */
class PackagesChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($values)
    {
        parent::__construct();


        $this->displayLegend(true);

        $labels = [];
        $quantity = [];


        foreach ($values as $v) {
            $labels[] = $v->plan_name;
            $quantity[] = $v->quantity;
        }

        $this->labels($labels);
        $this->dataset(trans('companies::statistics.popular_packages'), 'bar', $quantity)->options([
        ])->color('#f44336');


    }
}
