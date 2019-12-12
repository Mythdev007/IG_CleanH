@extends('layouts.app')

@section('content')

    <div class="row">

        @can('leads.browse')
            @widget('Modules\Dashboard\Widgets\CountWidget',['title' =>
            trans('dashboard::dashboard.widgets.leads'),'bg_color'=>'bg-pink','icon'=>'search','counter' =>
            $countLeads])
        @endcan

        @can('contacts.browse')
            @widget('Modules\Dashboard\Widgets\CountWidget',['title' =>
            trans('dashboard::dashboard.widgets.contacts'),'bg_color'=>'bg-cyan','icon'=>'contacts','counter' =>
            $countContacts])
        @endcan

        @can('orders.browse')
            @widget('Modules\Dashboard\Widgets\CountWidget',['title' =>
            trans('dashboard::dashboard.widgets.orders'),'bg_color'=>'bg-orange','icon'=>'pageview','counter' =>
            $countOrders])
        @endcan

        @can('invoices.browse')
            @widget('Modules\Dashboard\Widgets\CountWidget',['title' =>
            trans('dashboard::dashboard.widgets.invoices'),'bg_color'=>'bg-green','icon'=>'shopping_cart','counter' =>
            $countInvoices])
        @endcan

        @can('polizzacar.browse')
            @widget('Modules\Platform\Core\Widgets\AutoGroupDictWidget',
                    [
                    'coll_class' => 'col-lg-3 col-md-3 col-sm-4 col-xs-4',
                    'dict' =>'Modules\PolizzaCar\Entities\PolizzaCarStatus',
                    'moduleEntity' => 'Modules\PolizzaCar\Entities\PolizzaCar',
                    'moduleTable' =>'polizza_car',
                    'icon_type' => 'material',
                    'groupBy' => 'status_id',
                    'dataTableToFilter' => 'PolizzaCarDatatable'
                    ]
            )
        @endcan
    </div>

    <div class="row dashboard-row">

            @can('polizzacar.browse')
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card collapsible">
                    <div id="dashboard_polizzacar" class="header card-inside-title">
                        <h2 class="pointer">
                            <div class="header-buttons">
                                @can('polizzacar.create')
                                    <a class="btn btn-primary btn-create btn-crud" href="{{ route('polizzacar.polizzacar.create') }}">@lang('PolizzaCar::PolizzaCar.create')</a>
                                @endcan
                                <a data-toggle="modal" data-target="#genericModal" class="btn btn-primary bg-pink btn-create btn-crud" href="#">@lang('PolizzaCar::PolizzaCar.fast_quote')</a>
                            </div>
                            <div class="header-text">
                                @lang('dashboard::dashboard.widgets.polizzacar')
                                <span class="expander">
                                    <i class="fa fa-angle-up pointer" aria-hidden="true"></i>
                                </span>
                            </div>
                        </h2>
                    </div>
                    <div class="body panel-content">
                        <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                            {{ $polizzaCarDatatable->table(['width' => '100%']) }}
                        </div>
                    </div>
                </div>
            </div>
            @endcan

            <div class="col-md-3 col-lg-3 hidden-sm hidden-xs">
                <div class="card">
                    <div class="header">
                        <h2>
                            <div class="header-text">
                                Assistenza commerciale
                            </div> 
                        </h2>
                    </div>
                    <div class="body">
                        <ul class="list-group list-menu">
                        <li><p><i class="material-icons">phone</i><span class="icon-name">02 87.280.758</span></p></li>
                        <li><p><i class="material-icons">timelapse</i> <span class="icon-name"><span>dal Lunedì al Venerdì</span></p></li>
                        <li><p><i class="material-icons">schedule</i> <span class="icon-name">9.00-13.00 / 14.00-18.00</span> </p></li>
                        <li><p><i class="material-icons">mail_outline</i><a class="icon-name" href="mailto:a.vacca@vaance.com">a.vacca@vaance.com</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                        <div class="header">
                            <h2>
                                <div class="header-text">
                                    Assistenza tecnica
                                </div> 
                            </h2>
                        </div>
                    <div class="body">
                        <ul class="list-group list-menu">
                            <li><p><i class="material-icons">phonelink_setup</i><span class="icon-name">02 87.280.718</span></p></li>
                            <li><p><i class="material-icons">timelapse</i> <span class="icon-name">dal Lunedì al Venerdì</span></p></li>
                            <li><p><i class="material-icons">schedule</i> <span class="icon-name">9.00-13.00 / 14.00-18.00</span> </p></li>
                            <li><p><i class="material-icons">mail_outline</i><a class="icon-name" href="mailto:assistenza@vaance.net">Assistenza@vaance.net</a></p></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>

    <div class="row dashboard-row">
        @can('leads.browse')
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="card collapsible">
                <div id="dashboard_leads" class="header card-inside-title">

                    <span class="badge bg-pink pull-right">@lang('core::core.this_month')</span>
                    <h2 class="pointer">

                        @lang('dashboard::dashboard.widgets.leads_chart')

                        <span class="expander">
                            <i class="fa fa-angle-up pointer" aria-hidden="true"></i>
                        </span>
                    </h2>

                </div>
                <div class="body panel-content">
                    <div id="leads_chart" class="dashboard-leads_chart" style="height: 230px">
                        {!! $leadOverview->container() !!}
                    </div>


                </div>
            </div>
        </div>
        @endcan

        @can('payments.browse')
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="card collapsible">
                <div id="dashboard_income_vs_payments" class="header card-inside-title">


                    <div class="dropdown pull-right m-r-5">
                        <button  class="btn btn-xs bg-pink btn-flat dropdown-toggle" type="button" data-toggle="dropdown">{{ strtoupper($currentCurrency) }} @lang('core::core.last_three_months')<span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable">

                            @foreach($paymentCurrency as $k => $currency)
                                <li><a href="?ivseCurrency={{$currency}}">{{ $currency }}</a></li>

                            @endforeach

                        </ul>
                    </div>

                    <h2 class="pointer">
                        @lang('dashboard::dashboard.widgets.income_vs_expenses')
                        <span class="expander">
                            <i class="fa fa-angle-up pointer" aria-hidden="true"></i>
                        </span>
                    </h2>
                </div>
                <div class="body panel-content" style="text-align: center">
                    <div id="income_chart" class="dashboard-income_chartt" style="text-align: center; height: 230px">
                        {!! $incomeVsExpense->container() !!}
                    </div>
                </div>
            </div>
        </div>
        @endcan

    </div>

    <div class="row dashboard-row">

        @can('tickets.browse')
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card collapsible">
                <div id="dashboard_tickets" class="header card-inside-title">

                    <h2 class="pointer">
                        @lang('dashboard::dashboard.widgets.tickets')
                        <span class="expander">
                            <i class="fa fa-angle-up pointer" aria-hidden="true"></i>
                        </span>
                    </h2>
                </div>
                <div class="body panel-content">
                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                        {{ $ticketDatatable->table(['width' => '100%']) }}
                    </div>
                </div>
            </div>
        </div>
        @endcan

        @can('tickets.browse')
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card collapsible">
                    <div id="dashboard_tickets_overview" class="header card-inside-title">

                        <span class="badge bg-red pull-right">@lang('core::core.this_month')</span>
                        <h2 class="pointer">

                            @lang('dashboard::dashboard.widgets.tickets_overview')
                            <span class="expander">
                            <i class="fa fa-angle-up pointer" aria-hidden="true"></i>
                        </span>
                        </h2>
                    </div>
                    <div class="body panel-content">
                        <h5>@lang('dashboard::dashboard.widgets.tickets_by_status')</h5>
                        <div style="text-align: center; height: 253px">
                            {!! $ticketStatusOverview->container() !!}
                        </div>
                        <br /><br />
                        <h5>@lang('dashboard::dashboard.widgets.tickets_by_priority')</h5>
                        <div style="text-align: center; height: 253px">
                            {!! $ticketPriorityOverview->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endcan

    </div>

@endsection


@push('css-up')

@endpush
@push('scripts')


@push('scripts')

    <script type="text/javascript" src="{{ asset('vaance/plugins/chartjs/Chart.bundle.js')}}"></script>
    <script src="{!! Module::asset('dashboard:js/VAANCE_Dashboard.js') !!}"></script>
    <script src="{!! Module::asset('polizzacar:js/VAANCE_PolizzaCar.js') !!}"></script>

    {!! $leadOverview->script() !!}
    {!! $incomeVsExpense->script() !!}
    {!! $ticketStatusOverview->script() !!}
    {!! $ticketPriorityOverview->script() !!}

@endpush

@push('scripts')
{!! $ticketDatatable->scripts() !!}
{!! $polizzaCarDatatable->scripts() !!}
@endpush


