@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-vert-padding" >
            @include('subscription::partial.menu')
        </div>

        <div  class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-vert-padding">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>

                            <div class="header-text">
                                @lang($language_file.'.invoices.title')
                                <small>@lang($language_file.'.invoices.description')</small>
                            </div>

                        </h2>

                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-12">


                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                             @lang($language_file.'.invoices.number')
                                        </th>
                                        <th>
                                            @lang($language_file.'.invoices.payment')
                                        </th>

                                        <th>

                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>
                                                <p>

                                                    <b>{{ $invoice->invoice_number }}</b> <br />
                                                    <span class="small">@lang($language_file.'.invoices.product'): {{ $invoice->product_name }}</span> <br />
                                                    <span class="small">@lang($language_file.'.invoices.invoice_date'): {{ \Modules\Platform\Core\Helper\UserHelper::formatUserDate($invoice->invoice_date) }}</span> <br />
                                                    <span class="small">@lang($language_file.'.invoices.provider'): {{ $invoice->provider_name }}</span> <br />

                                                </p>

                                            </td>
                                            <td>
                                                <p>

                                                    {{ number_format(($invoice->total),2,',',',')}} {{ $invoice->currency_name }}


                                                </p>

                                            </td>

                                            <td>

                                                    <a href="{{ route('subscription.invoices.download',$invoice->id) }}" class="btn btn-sm btn-default">@lang($language_file.'.invoices.download')</a>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    @foreach($includeViews as $v)
        @include($v)
    @endforeach

@endsection

@push('css')
    @foreach($cssFiles as $file)
        <link rel="stylesheet" href="{!! Module::asset($moduleName.':css/'.$file) !!}"></link>
    @endforeach
@endpush

@push('scripts')
    @foreach($jsFiles as $jsFile)
        <script src="{!! Module::asset($moduleName.':js/'.$jsFile) !!}"></script>
    @endforeach
@endpush

@push('scripts')



@endpush



