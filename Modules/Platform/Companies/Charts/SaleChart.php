<?php

namespace Modules\Platform\Companies\Charts;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


/**
 * Class SaleChart
 * @package Modules\Platform\Companies\Charts
 */
class SaleChart extends Chart
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
        $income = [];

        foreach ($values as $v) {
            $labels[] = $v->yearMonth;
            $quantity[] = $v->quantity;
            $income[] = $v->income;
        }

        $this->labels($labels);
        $this->dataset(trans('companies::statistics.sold'), 'line', $quantity)->options([

        ])->color('#2196F3');
        $this->dataset(trans('companies::statistics.income'), 'line', $income)->color('#ffa21a');

    }
}
