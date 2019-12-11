<?php

?>

@extends('layouts.auth')

@section('body_class','login-page')

@section('content')

    <div class="login-box">


        <div class="card">
            <div class="body">

                <div class="logo">

                    <a href="javascript:void(0);"><img src="{{ asset(config('vaance.login_logo')) }}"/></a>

                </div>
                <div class="col-lg-10 col-lg-offset-1">


                    <form id="sign_up" method="POST" action="{{ route('login') }}">

                        @if (isset($errorMessage))
                            <span class="help-block">
                                <strong>{{ $errorMessage }}</strong>
                        </span>
                        @endif

                        {{ csrf_field() }}

                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                            <div class="form-line {{ $errors->has('email') ? ' error' : '' }}">
                                <input id="name" type="text" placeholder="@lang('auth.username')"
                                       value="" class="form-control" name="email" autofocus>
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
                                <input id="password" placeholder="@lang('auth.password')" value=""
                                       type="password" class="form-control" name="password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                             </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-6">

                                <input type="checkbox" id="rememberme" name="remember"
                                       {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-blue">
                                <label for="rememberme">@lang('auth.remember_me')</label>


                            </div>
                            <div class="col-xs-6 text-right">
                                <button class="btn bg-blue" type="submit">@lang('auth.sign_in')</button>
                            </div>


                        </div>

                            @if(config('vaance.GOOGLE_RECAPTCHA_KEY'))
                                <div class="row">
                                    <div class="col-sm-12 text-center" >

                                        @if($errors->has('g-recaptcha-response'))
                                            <span class="help-block error-block">
                                             <strong class="col-red">@lang('auth.invalid_captacha')</strong>
                                            </span>
                                        @endif

                                        <div class="g-recaptcha" style="display: inline-block"  data-sitekey="{{ config('vaance.GOOGLE_RECAPTCHA_KEY') }}"></div>
                                    </div>
                                </div>
                            @endif

                        <div class="row m-t-15 m-b--20">
                            @if(config('vaance.allow_registration'))

                                <div class="col-xs-12 text-right">
                                    <a class="font-bold"
                                       href="{{ route('password.request') }}">@lang('auth.forget_password')</a>
                                </div>
                            @else
                                @if(config('vaance.demo'))
                                    <div class="col-xs-6">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button"
                                                    id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                Choose User
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a id="userAdmin" href="#">Platform Admin</a></li>
                                                <li><a id="userCompany1" href="#">Strategica</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 align-right font-bold">
                                        <a class="font-b"
                                           href="{{ route('password.request') }}">@lang('auth.forget_password')</a>
                                    </div>
                                @else
                                    <div class="col-xs-12 align-right font-bold">
                                        <a class="font-bold" href="{{ route('password.request') }}">@lang('auth.forget_password')</a>
                                    </div>
                                @endif





                            @endif

                        </div>





                    </form>

                    @if(config('services.github.client_id') || config('services.twitter.client_id') || config('services.facebook.client_id')  || config('services.google.client_id'))
                        <br/>.
                        <div class="form-group text-center">
                            @if(config('services.github.client_id'))
                                <a href="{{ url('/auth/github') }}" class="btn btn-sm btn-github"><i
                                            class="fa fa-github"></i> Github</a>
                            @endif
                            @if(config('services.twitter.client_id'))
                                <a href="{{ url('/auth/twitter') }}" class="btn btn-sm btn-twitter"><i
                                            class="fa fa-twitter"></i> Twitter</a>
                            @endif
                            @if(config('services.facebook.client_id'))
                                <a href="{{ url('/auth/facebook') }}" class="btn btn-sm btn-facebook"><i
                                            class="fa fa-facebook"></i> Facebook</a>
                            @endif

                                @if(config('services.google.client_id'))
                                    <a href="{{ url('/auth/google') }}" class="btn btn-sm btn-google"><i
                                                class="fa fa-google"></i> Google</a>
                                @endif
                        </div>
                    @endif


                    @if(config('vaance.allow_registration'))
                        <div class="col-lg-12 login-sentence">

                            <h4 class="text-center">@lang('auth.dont_have_account')  @lang('auth.create_account_its_free')</h4>
                            <br/>
                            <br/>
                            <div class="text-center">
                                <a class="font-bold btn bg-blue btn-md " href="{{ route('register') }}">
                            <span class="font-25">
                                @lang('auth.register')
                            </span>

                                </a>
                            </div>

                        </div>
                    @endif

                </div>

            </div>
        </div>

    </div>

@endsection
