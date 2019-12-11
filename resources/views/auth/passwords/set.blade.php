@extends('layouts.auth')
@section('content')

<div class="login-box">
<div class="card">
    <div class="body">
        <div class="logo">
            <a href="javascript:void(0);"><img src="{{ asset(config('vaance.login_logo')) }}"/></a>
        </div>
        <div class="col-lg-10 col-lg-offset-1">
            <form method="POST" action="{{ route('password.custom.update') }}">
                {{ csrf_field() }}
                <input type="hidden" name="verification_token" value="{{ $user->verification_token ?? '' }}" />
                <h1>
                    <div class="login-logo text-center" >
                        <a href="#" style="font-weight: bodl; font-size: 20px;">
                            {{ trans('core::core.set_password') }}
                        </a>
                    </div>
                </h1>

                
                @if(session('message'))
                    <div class="alert alert-success" role="alert">{!! session('message') !!}</div>
                @else
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" placeholder="@lang('auth.username')"
                                   value="{{ $user->email }}" class="form-control" name="email" disabled>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line has-feedback">
                            <input type="password" name="password" id="password" class="form-control" required placeholder="{{ trans('core::core.login_password') }}" value="{{ old('password') }}" autofocus>
                        </div>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line has-feedback">
                            <input type="password" name="password_confirmation" id="password_confirm" class="form-control" required placeholder="{{ trans('core::core.login_password_confirmation') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('core::core.set_password') }}
                            </button>
                        </div>
                    </div>
                @endif

            </form>
                        
            
        </div>
    </div>
</div>
</div>
@endsection