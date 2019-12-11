@extends('layouts.auth')

@section('body_class','signup-page')

@section('content')

    <div class="signup-box login-box">


        <div class="card">
            <div class="body">

                <div class="col-lg-6 col-sm-12">

                    <div class="text-center">
                        <img src="{{ asset(config('vaance.login_logo')) }}" />
                    </div>

                    <form id="sign_up" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <h4 class="msg">@lang('auth.register_title')</h4>
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                            <div class="form-line {{ $errors->has('first_name') ? ' error' : '' }}">
                                <input id="name" placeholder="@lang('auth.first_name')" type="text" class="form-control"
                                       name="first_name" value="{{ old('first_name') }}" autofocus>
                            </div>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                             </span>
                            @endif

                        </div>
                        <div class="input-group {{ $errors->has('email') ? ' error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                            <div class="form-line">
                                <input id="email" placeholder="@lang('auth.email')" type="email" class="form-control"
                                       name="email" value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                             </span>
                            @endif
                        </div>
                        <div class="input-group {{ $errors->has('password') ? ' error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                            <div class="form-line">
                                <input id="password" placeholder="@lang('auth.password')" type="password"
                                       class="form-control" name="password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                             </span>
                            @endif

                            <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                            <div class="form-line">
                                <input id="password-confirm" placeholder="@lang('auth.confirm_password')"
                                       type="password" class="form-control" name="password_confirmation">
                            </div>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                             </span>
                            @endif
                        </div>

                        <div class="col-sm-4">
                            <button class="btn btn-lg bg-pink waves-effect waves-block" type="submit">@lang('auth.sign_up')</button>
                        </div>
                        <div class="col-sm-8 text-right p-r-0">
                            <a class="font-bold" href="{{ route('login') }}" style="line-height: 40px">@lang('auth.already_have_membership')</a>
                        </div>

                        @if(config('vaance.GOOGLE_RECAPTCHA_KEY'))
                            <div class="row">
                                <div class="col-sm-12 text-center">

                                    @if($errors->has('g-recaptcha-response'))
                                        <span class="help-block error-block">
                                             <strong class="col-red">@lang('auth.invalid_captacha')</strong>
                                        </span>
                                    @endif

                                    <div class="g-recaptcha" style="display: inline-block"  data-sitekey="{{ config('vaance.GOOGLE_RECAPTCHA_KEY') }}"></div>
                                </div>
                            </div>
                        @endif

                    </form>

                    <div class="col-sm-12 text-center">

                        @if(config('services.github.client_id') || config('services.twitter.client_id') || config('services.facebook.client_id')  || config('services.google.client_id'))
                            <p>
                                @lang('auth.or_signup_using')
                            </p>

                            @if(config('services.github.client_id'))
                                <a href="{{ url('/auth/github') }}" class="btn btn-md btn-github"><i
                                            class="fa fa-github"></i> Github</a>
                            @endif
                            @if(config('services.twitter.client_id'))
                                <a href="{{ url('/auth/twitter') }}" class="btn btn-md btn-twitter"><i
                                            class="fa fa-twitter"></i> Twitter</a>
                            @endif
                            @if(config('services.facebook.client_id'))
                                <a href="{{ url('/auth/facebook') }}" class="btn btn-md btn-facebook"><i
                                            class="fa fa-facebook"></i> Facebook</a>
                            @endif

                            @if(config('services.google.client_id'))
                                <a href="{{ url('/auth/google') }}" class="btn btn-sm btn-google"><i
                                            class="fa fa-google"></i> Google</a>
                            @endif
                        @endif

                    </div>

                </div>


                <div class="col-lg-6 col-sm-12 text-center">

                    <img class="img-responsive margin-0" src="{{ asset(config('vaance.register_img')) }}"/>

                </div>


            </div>
        </div>

        @if(config('vaance.vectors'))
            <div class="text-center">
                <a class="vectors" target="_blank" href="https://www.freepik.com">Vectors by Freepik</a>
            </div>
        @endif
    </div>


    <div id="signupModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center">
                        <h4 class="msg">

                            @lang('auth.please_wait_we_are_preparing')

                        </h4>

                        @if(config('vaance.show_register_gif'))
                            <iframe src="https://giphy.com/embed/326joM06WxFNMSkPjj" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/bublywater-work-tired-326joM06WxFNMSkPjj">via GIPHY</a></p>
                        @endif
                    </div>


                </div>

            </div>

        </div>
    </div>

@endsection
