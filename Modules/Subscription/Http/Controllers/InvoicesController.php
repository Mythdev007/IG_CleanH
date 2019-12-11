<?php


namespace Modules\Subscription\Http\Controllers;


class InvoicesController extends SubscriptionBaseController
{

    /**
     * Get invoices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get()
    {

        $view = view('subscription::invoices');

        $this->setupData($view);

        $view->with('invoices', $this->subscriptionService->getSubscriptionInvoices());

        return $view;
    }


    /**
     * Download single invoice
     * @param $invoiceId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function download($invoiceId)
    {


        if (\Auth::user()->canAccessCompany()) {
            $invoice = $this->subscriptionService->getSubscriptionInvoice($invoiceId);

            if (!empty($invoice)) {
                return $invoice->download();
            }
        }

        return redirect(route('subscription.invoices.get'));

    }

}
