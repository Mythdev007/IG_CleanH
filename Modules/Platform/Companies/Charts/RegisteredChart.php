<?php

namespace Modules\Platform\Companies\Charts;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


/**
 * Class RegisteredChart
 * @package Modules\Platform\Companies\Charts
 */
class RegisteredChart extends Chart
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
        }

        $this->labels($labels);
        $this->dataset(trans('companies::statistics.registered'), 'line', $quantity)->options([
        ])->color('#000000');

    }
}
