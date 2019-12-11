<?php

namespace Modules\Platform\Companies\Charts;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


/**
 * Class PaymentChart
 * @package Modules\Platform\Companies\Charts
 */
class PaymentChart extends Chart
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
            $labels[] = $v->provider_name;
            $quantity[] = $v->quantity;
        }
        
        $this->labels($labels);
        $this->dataset(trans('companies::statistics.payment_types'), 'bar', $quantity)->options([
        ])->color('green');


    }
}
