<?php


namespace Modules\Subscription\Http\Controllers;


class BoardController extends SubscriptionBaseController
{

    public function get()
    {
        $view = view('subscription::board');

        $this->setupData($view);


        return $view;
    }


}
