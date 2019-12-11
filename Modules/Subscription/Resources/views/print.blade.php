<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Invoice</title>

    <!-- Invoice styling -->
    <style>
        table, tr, td, th, tbody, thead, tfoot {
            page-break-inside: avoid !important;
        }

        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #777;

        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06F;
        }

        .invoice-box {

            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.top table td.title .logo {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .title .logo img {
            max-width: 300px;
            max-height: 300px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            padding-left: 10px;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;

        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
            text-align: left;
            padding-left: 10px;

        }

        .invoice-box table tr.summary td {
            border-bottom: 1px solid #eee;
            text-align: left;
            padding-left: 10px;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right !important;
        }

        .width-50-percent {
            width: 50%;;
        }
        .text-paid{
            color: #3cd458;
        }
        .text-unpaid{
            color: #fb6340;
        }


    </style>
</head>

<body>

<div class="invoice-box">

    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td colspan="2" class="text-right">

                            @lang('subscription::subscription.invoice.invoice_number') :


                            {{ $invoice->invoice_number }}


                            <br>
                            @lang('subscription::subscription.invoice.invoice_date')
                            : {{ \Modules\Platform\Core\Helper\UserHelper::formatUserDate($invoice->invoice_date) }}<br>

                        </td>
                    </tr>
                    <tr>
                        <td class="title">
                            <h2>@lang('subscription::subscription.invoice.from')</h2>

                            {!!   nl2br($invoice->invoice_from) !!}

                        </td>
                        <td class="text-right">
                            <h2>@lang('subscription::subscription.invoice.to')</h2>

                            {!!   nl2br($invoice->invoice_to) !!}

                            <br/>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                @lang('subscription::subscription.invoice.product_service')
            </td>

            <td class="text-right">
                @lang('subscription::subscription.invoice.amount')
            </td>
        </tr>


        <tr class="item">
            <td>
                {{ $invoice->product_name }}
            </td>
            <td class="text-right">


                {{ number_format($invoice->total,2) }} {{ $invoice->currency_name }}

            </td>
        </tr>
        @if($invoice->tax_rate != null)
            <tr class="item">
                <td>

                </td>
                <td class="text-right">
                    @lang('subscription::subscription.invoice.tax_value') ({{ $invoice->tax_description }}):
                    {{ number_format($invoice->tax_value,2) }} {{ $invoice->currency_name }}
                </td>
            </tr>

            <tr class="item">
                <td>

                </td>
                <td class="text-right">
                    <b>@lang('subscription::subscription.invoice.total') {{ number_format($invoice->total,2) }} {{ $invoice->currency_name }}</b>
                </td>
            </tr>
        @endif

        <tr class="item">
            <td>

            </td>
            <td class="text-right">

                @lang('subscription::subscription.invoice.invoice_status'):

                @if($invoice->status)
                    <b class="text-paid">@lang('subscription::subscription.invoice.paid')</b>
                @else
                    <b class="text-unpaid">@lang('subscription::subscription.invoice.unpaid')</b>
                @endif
            </td>
        </tr>






    </table>

    @if($invoice->provider_id)
        <br/><br/>
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    @lang('subscription::subscription.invoice.payment_information')
                </td>
            </tr>
            <tr class="item">
                <td>
                    @lang('subscription::subscription.invoice.provider'): {{ $invoice->provider_name }} <br />
                    @lang('subscription::subscription.invoice.provider_id'): {{ $invoice->provider_id  }} <br />
                    @lang('subscription::subscription.invoice.provider_status'): {{ $invoice->provider_status }}
                </td>
            </tr>
        </table>
    @endif

    @if($invoice->terms_and_cond)
        <br/><br/>
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    @lang('subscription::subscription.invoice.terms_and_cond')
                </td>
            </tr>
            <tr class="item">
                <td>
                    {!!   nl2br($invoice->terms_and_cond) !!}
                </td>
            </tr>
        </table>
    @endif

    @if($invoice->notes)
        <br/><br/>
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    @lang('subscription::subscription.invoice.notes')
                </td>
            </tr>
            <tr class="item">
                <td>
                    {!!   nl2br($invoice->notes) !!}
                </td>
            </tr>
        </table>
    @endif
</div>

</body>

</html>
