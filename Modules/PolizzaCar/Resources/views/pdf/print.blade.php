<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $entity->name }}</title>

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

            margin: auto;

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

        .text-right {
            text-align: right !important;
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
                        <td class="title">
                            <div class="logo">
                                @if(\Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_DISPLAY_SHOW_LOGO_IN_PDF))
                                    {!!   \Modules\Platform\Core\Helper\SettingsHelper::logoPath() !!}
                                @else
                                    {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_NAME, config('app.name'))}}
                                @endif
                            </div>

                        </td>
                        <td class="text-right">
                            @lang('polizzacar::polizzacar.pdf.quote') #: {{ $entity->id }}<br>
                            @lang('polizzacar::polizzacar.pdf.created'): {{ \Modules\Platform\Core\Helper\UserHelper::formatUserDate($entity->created_at) }}<br>
                            @lang('polizzacar::polizzacar.pdf.valid_until'): {{ \Modules\Platform\Core\Helper\UserHelper::formatUserDate($entity->valid_unitl) }}<br>
                            <br/>
                            <b>@lang('polizzacar::polizzacar.pdf.address')</b><br/>
                            {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_ADDRESS_)}} <br/>
                            {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_CITY)}} {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_STATE)}} {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_POSTAL_CODE)}}

                            {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_COUNTRY)}} <br/>
                            @if(!empty(\Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_VAT_ID)))
                                @lang('polizzacar::polizzacar.pdf.vat'): {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_VAT_ID)}} <br/>
                            @endif
                            @lang('polizzacar::polizzacar.pdf.phone'): {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_PHONE)}} <br/>
                            @lang('polizzacar::polizzacar.pdf.fax'): {{ \Krucas\Settings\Facades\Settings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_COMPANY_FAX)}} <br/>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <h2>@lang('polizzacar::polizzacar.pdf.quotation_for')</h2>
                            @if(!empty($entity->account))
                                {{ $entity->account->name }} <br/>
                            @endif
                            {{ $entity->street }} <br/>
                            {{ $entity->city }}, {{ $entity->zip_code }}, <br/>
                            {{ $entity->state }} {{$entity->country }} <br/>

                            @if(!empty($entity->contact)) <br/>
                            <b>@lang('polizzacar::polizzacar.pdf.contact')</b> <br/>
                            {{ $entity->contact->full_name }} <br/>
                            @lang('polizzacar::polizzacar.pdf.email'): {{ $entity->contact->mobile }} <br/>
                            @lang('polizzacar::polizzacar.pdf.mobile'): {{ $entity->contact->email }} <br/>
                            @lang('polizzacar::polizzacar.pdf.office_phone'): {{ $entity->contact->phpne }}
                            @endif
                        </td>

                        <td>
                            @if(!empty($entity->owner))
                                <h2>@lang('polizzacar::polizzacar.pdf.sales_representative')</h2>

                                {{ $entity->owner->name }} <br/>
                                @lang('polizzacar::polizzacar.pdf.email'): {{ $entity->owner->email }} <br/>
                                @lang('polizzacar::polizzacar.pdf.mobile'): {{ $entity->owner->mobile_phone }} <br/>
                                @lang('polizzacar::polizzacar.pdf.office_phone'): {{ $entity->owner->office_phone }}

                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                @lang('polizzacar::polizzacar.pdf.product_service')
            </td>

            <td>
                @lang('polizzacar::polizzacar.pdf.unit_cost')
            </td>
            <td>
                @lang('polizzacar::polizzacar.pdf.quantity')
            </td>
            <td>
                @lang('polizzacar::polizzacar.pdf.line_total')
            </td>
        </tr>

       
        <tr class="summary">
            <td colspan="2" rowspan="7">
            </td>
            <td>


                @lang('polizzacar::polizzacar.pdf.subtotal')

            </td>
            <td>
                {{ number_format($entity->subtotal,2) }}
                @if(!empty($entity->currency))
                    {{ $entity->currency->code }}
                @endif
            </td>
        </tr>
        <tr class="summary">
            <td>
                <label class=" text-right">
                    @lang('polizzacar::polizzacar.pdf.discount')
                </label>
            </td>
            <td>
                {{ number_format($entity->discount,2) }}
                @if(!empty($entity->currency))
                    {{ $entity->currency->code }}
                @endif
            </td>
        </tr>
        <tr class="summary">
            <td>
                <label class=" text-right">
                    @lang('polizzacar::polizzacar.pdf.delivery_cost')
                </label>
            </td>
            <td>
                {{ number_format($entity->delivery_cost,2) }}
                @if(!empty($entity->currency))
                    {{ $entity->currency->code }}
                @endif
            </td>
        </tr>
        <tr class="summary">
            <td>
                <label class=" text-right">
                    @lang('polizzacar::polizzacar.pdf.tax')
                    @if(!empty($entity->tax))
                        ({{ $entity->tax->name }})
                    @endif
                </label>
            </td>
            <td>
                {{ number_format($entity->taxValue,2) }}
                @if(!empty($entity->currency))
                    {{ $entity->currency->code }}
                @endif
            </td>
        </tr>
        <tr class="summary">
            <td>
                <label class=" text-right">
                    @lang('polizzacar::polizzacar.pdf.gross_value')
                </label>
            </td>
            <td>
                <strong>
                    {{ number_format($entity->grossValue,2) }}
                    @if(!empty($entity->currency))
                        {{ $entity->currency->code }}
                    @endif
                </strong>
            </td>
        </tr>

    </table>
    @if($entity->shipping)
        <br/><br/>
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    @lang('polizzacar::polizzacar.pdf.shipping')
                </td>
            </tr>
            <tr class="item">
                <td>
                    @if(!empty($entity->quoteCarrier))
                        @lang('polizzacar::polizzacar.pdf.carrier'): {{$entity->quoteCarrier->name}}  <br/>
                    @endif
                    {{ $entity->shipping }}
                </td>
            </tr>
        </table>
    @endif
    @if($entity->notes)
        <br/><br/>
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    @lang('polizzacar::polizzacar.pdf.notes')
                </td>
            </tr>
            <tr class="item">
                <td>
                    {{ $entity->notes }}
                </td>
            </tr>
        </table>
    @endif
</div>

</html>
