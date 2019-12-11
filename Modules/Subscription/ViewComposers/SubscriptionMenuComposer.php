<?php

namespace Modules\Subscription\ViewComposers;

use Illuminate\View\View;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;

/**
 * Class MenuComposer
 * @package Modules\Subscription\ViewComposers
 */
class SubscriptionMenuComposer
{


    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $user = \Auth::user();

        $company = $user->companyContext();

        $settingsMenu = Menu::new();
        $settingsMenu->addClass('list-group list-menu card');
        $settingsMenu->setActiveFromUrl(url()->current());


        $settingsMenu->add(Link::to(route('subscription.board'), trans('subscription::subscription.menu.board')));


        $settingsMenu->add(Link::to(route('subscription.subscribe'), trans('subscription::subscription.menu.purchase')));


        $settingsMenu->add(Link::to(route('subscription.invoices.get'), trans('subscription::subscription.menu.invoices')));


        $settingsMenu->each(function (Link $link) {
            $link->addClass('list-group-item');
        });

        $view->with('subscriptionMenu', $settingsMenu);
    }
}
