@extends('layouts.app')

@section('content')

    <div class="block-header">
        <h2>@lang('settings::settings.module')</h2>
    </div>

    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-vert-padding">

            @include('settings::partial.menu')

        </div>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-vert-padding">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            @lang('companies::statistics.title')
                            <small>@lang('companies::statistics.description')</small>
                        </h2>
                    </div>
                    <div class="body">

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 class="card-inside-title">@lang('companies::statistics.panel.sales')</h2>

                                <div class="panel-content m-t-10">
                                    <div class="col-sm-12 row">

                                        <div id="sale_chart" style="text-align: center; height: 230px">
                                            {!! $saleChart->container() !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 class="card-inside-title">@lang('companies::statistics.panel.companies')</h2>

                                <div class="panel-content m-t-10">
                                    <div class="col-sm-12 row">
                                        <div id="registered_chart" style="text-align: center; height: 230px">
                                            {!! $registeredChart->container() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                <div class="panel-content m-t-10 row">

                                    <div class="col-sm-6">
                                        <h2 class="card-inside-title">@lang('companies::statistics.panel.popular_packages')</h2>

                                        <div class="panel-content m-t-10">
                                            <div class="col-sm-12 row">
                                                <div id="popuplar_packages" style="text-align: center; height: 230px">
                                                    {!! $packagesChart->container() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2 class="card-inside-title">@lang('companies::statistics.panel.payment_type')</h2>

                                        <div class="panel-content m-t-10">
                                            <div class="col-sm-12 row">
                                                <div id="popuplar_packages" style="text-align: center; height: 230px">
                                                    {!! $paymentChart->container() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')


    <script type="text/javascript" src="{{ asset('vaance/plugins/chartjs/Chart.bundle.js')}}"></script>

    {!! $saleChart->script() !!}
    {!! $registeredChart->script() !!}
    {!! $packagesChart->script() !!}
    {!! $paymentChart->script() !!}
@endpush
