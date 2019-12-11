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

        .ticket-box {

            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .ticket-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .ticket-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .ticket-box table tr.top table td {
            padding-bottom: 10px;
        }

        .ticket-box table tr.top table td.title .logo {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .title .logo img {
            max-width: 300px;
            max-height: 300px;
        }

        .ticket-box table tr.information table td {
            padding-bottom: 40px;
        }

        .ticket-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            padding-left: 10px;
        }

        .ticket-box table tr.details td {
            padding-bottom: 20px;

        }

        .ticket-box table tr.item td {
            border: 1px solid #eee;
            text-align: left;
            padding-left: 10px;

        }

        .ticket-box table tr.summary td {
            border-bottom: 1px solid #eee;
            text-align: left;
            padding-left: 10px;
        }

        .ticket-box table tr.item.last td {
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


    </style>
</head>

<body>

<div class="ticket-box">




    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">

                            @if(\Modules\Platform\Core\Helper\CompanySettings::get(\Modules\Platform\Core\Helper\SettingsHelper::S_DISPLAY_SHOW_LOGO_IN_PDF))
                                <div class="logo">
                                    {!!   \Modules\Platform\Core\Helper\SettingsHelper::pdfLogoPath() !!}
                                </div>
                            @else
                                @include('tickets::pdf.company_part')
                            @endif

                        </td>
                        <td class="text-right">
                            <div>
                                @if(config('tickets.qrcode_in_print'))
                                    <div style="float: right; margin-left: 10px">
                                        {!! QrCode::size(150)->margin(1)->generate(route('tickets.tickets.show',$entity->id)); !!}
                                    </div>
                                @endif
                                <div>
                                    <b>@lang('tickets::tickets.ticket')</b>: {{ $entity->name }}<br>
                                    <b>@lang('tickets::tickets.form.due_date')</b>: {{ \Modules\Platform\Core\Helper\UserHelper::formatUserDate($entity->due_date) }}
                                </div>

                            </div>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>

    </table>

    <table cellpadding="0" cellspacing="0">
        <tr >
            <td class="text-center">
                <h1>
                    @lang('tickets::tickets.ticket') {!! $entity->name !!} @lang('tickets::tickets.pdf_title_suffix')
                </h1>
            </td>
        </tr>
    </table>
    <br />
    <br />

    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>
                @lang('tickets::tickets.form.ticket_priority_id')
            </td>
            <td>
                @lang('tickets::tickets.form.ticket_status_id')
            </td>
            <td>
                @lang('tickets::tickets.form.owned_by')
            </td>
            <td>
                @lang('tickets::tickets.form.ticket_owner_id')
            </td>
        </tr>
        <tr class="item">
            <td>
                {!! optional($entity->ticketPriority)->name !!}
            </td>
            <td>
                {!! optional($entity->ticketStatus)->name !!}
            </td>
            <td>
                {!! optional($entity->ownedBy)->name !!}
            </td>
            <td>
                {!! optional($entity->ticketOwner)->name !!}
            </td>
        </tr>
    </table>
    <br />
    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>
                @lang('tickets::tickets.form.due_date')
            </td>
            <td>
                @lang('tickets::tickets.form.ticket_category_id')
            </td>
            <td>
                @lang('tickets::tickets.form.ticket_severity_id')
            </td>
            <td>
                @lang('tickets::tickets.form.parent_id')
            </td>
        </tr>
        <tr class="item">
            <td>
                {{ \Modules\Platform\Core\Helper\UserHelper::formatUserDate($entity->due_date) }}
            </td>
            <td>
                {!! optional($entity->ticketCategory)->name !!}
            </td>
            <td>
                {!! optional($entity->ticketSeverity)->name !!}
            </td>
            <td>
                {!! optional($entity->parent)->name !!}
            </td>
        </tr>
    </table>
    <br/>
    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>
                @lang('tickets::tickets.form.account_id')
            </td>
            <td>
                @lang('tickets::tickets.form.contact_id')
            </td>
        </tr>
        <tr class="item">
            <td class="width-50-percent">
                {!! optional($entity->account)->name !!}
            </td>
            <td class="width-50-percent">
                {!! optional($entity->contact)->full_name !!}
            </td>
        </tr>
    </table>
    <br/>
    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>
                @lang('tickets::tickets.form.description')
            </td>
        </tr>
        <tr class="item">
            <td>
                {!! $entity->description !!}
            </td>
        </tr>
    </table>

    <br/>
    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>
                @lang('tickets::tickets.form.resolution')
            </td>
        </tr>
        <tr class="item">
            <td>
                {!! $entity->resolution !!}
            </td>
        </tr>
    </table>

    @if($entity->notes)
        <br/>
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>
                    @lang('tickets::tickets.form.notes')
                </td>
            </tr>
            <tr class="item">
                <td>
                    {!! $entity->notes !!}
                </td>
            </tr>
        </table>
    @endif

</div>

</body>

</html>
