@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-vert-padding">
            @include('subscription::partial.menu')
        </div>

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 no-vert-padding">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>

                            <div class="header-text">
                                @lang($language_file.'.module')
                                <small>@lang($language_file.'.module_description')</small>
                            </div>

                        </h2>

                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="text-center">
                                    <h4>@lang($language_file.'.you_are_on')<span class="text-success"> {{ $company->plan->name }}</span> @lang($language_file.'.plan')</h4>

                                    @if($company->subscription_valid_until)
                                        <p>
                                            <b>@lang($language_file.'.you_account_is_valid_until') {{ \Modules\Platform\Core\Helper\UserHelper::formatUserDate($company->subscription_valid_until) }} </b>
                                        </p>
                                    @endif

                                    <p>@lang($language_file.'.learn_more_about_each_plan')</p>
                                </div>

                            </div>


                            <div class="col-lg-12 table-responsive">


                                <table class="table pricing-table">

                                    @foreach($plans as $plan)
                                        <tr class="row plan-bg {{  $plan->featured == 1 ? 'featured-plan' : ''}} ">
                                            <td class="text-center" style="color: {{ $plan->color }}">
                                                <div class="head" >
                                                    <span>{{ $plan->name }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                         <span class="price">
                                             <span class="currency">{{ $plan->full_price }}</span>
                                             <span class="sign">{{ $plan->currency->symbol }}</span>
                                             <span class="month">/@lang($language_file.'.'.$plan->period)</span>
                                         </span>
                                            </td>
                                            <td>
                                                <div class="description">
                                                    <p class="bold"> {{ $plan->description }}</p>
                                                    {!! $plan->features_list  !!}
                                                </div>

                                            </td>
                                            <td class="text-left">

                                                <div class="plan-btn">


                                                    @if( !$plan->is_free && $plan->can_purchase )

                                                        @if($plan->id == $company->plan->id)
                                                            <b class="text-success">@lang($language_file.'.current_plan')</b>
                                                            <br /> <br />
                                                        @endif

                                                        @if($enabled_paypal)
                                                            <div class="display-block m-b-10">

                                                                <form action="{{ route('subscription.payment.paypal') }}" method="POST">

                                                                    {{ csrf_field() }}

                                                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}" />

                                                                    <button type="submit" class="btn btn-sm bg-paypal">
                                                                        @lang($language_file.'.paypal')
                                                                    </button>
                                                                </form>


                                                            </div>
                                                        @endif

                                                        @if($enabled_stripe)

                                                                <div class="display-block m-b-10">
                                                                    <form action="{{ route('subscription.payment.stripe') }}" method="POST">

                                                                        {{ csrf_field() }}

                                                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}" />

                                                                        <script
                                                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                                                data-email="{{  Auth::user()->email }}"
                                                                                data-key="{{ config('vaance.stripe_public_key') }}"
                                                                                data-amount="{{ $plan->full_price_cents }}"
                                                                                data-name="{{ $plan->name }}"
                                                                                data-description="{{ $plan->description }}"
                                                                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                                                data-locale="auto"
                                                                                data-currency="{{  $plan->currency->code }}">
                                                                        </script>
                                                                    </form>
                                                                </div>


                                                        @endif
                                                        @if($enabled_cash)
                                                                <div class="display-block m-b-10">

                                                                    <form action="{{ route('subscription.payment.cash') }}" method="POST">

                                                                        {{ csrf_field() }}

                                                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}" />

                                                                        <button type="submit" class="btn btn-sm bg-cash" >
                                                                            @lang($language_file.'.cash')
                                                                        </button>
                                                                    </form>


                                                                </div>
                                                        @endif

                                                    @elseif($plan->id ==  $company->plan->id)
                                                        <b class="text-success">@lang($language_file.'.current_plan')</b>
                                                    @else

                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

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


