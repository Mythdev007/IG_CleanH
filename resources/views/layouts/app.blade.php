<?php

use Modules\Platform\Core\Helper\SettingsHelper as SettingsHelper;
use Krucas\Settings\Facades\Settings as Settings;

?>


        <!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> {{ \Modules\Platform\Core\Helper\SettingsHelper::getApplicationTitle() }}</title>
    <!-- Favicon-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset(config('vaance.favicon')) }}" type="image/png">

    <link href="{{ asset('vaance/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,latin-ext,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

    @stack('css-up')



    <script type="text/javascript" src="{{ asset('vaance/plugins/jquery/jquery.min.js')}}"></script>

    @if(config('broadcasting.connections.pusher.key') != '')
        <script src="https://js.pusher.com/3.1/pusher.min.js"></script>
        <script>

            window.PUSHER = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
                cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
                encrypted: true
            });

        </script>
    @endif

        <!-- Css -->
        {!!  Packer::css([
            '/vaance/plugins/bootstrap/css/bootstrap.css',
            '/vaance/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
            '/vaance/plugins/node-waves/waves.css',
            '/vaance/plugins/animate-css/animate.css',
            '/vaance/plugins/bootstrap-select/css/bootstrap-select.css',
            '/vaance/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css',
            '/vaance/plugins/jquery-datatable/extensions/responsive/css/responsive.dataTables.css',
            '/css/style.css',
            '/vaance/plugins/offlinejs/offline-theme-chrome.css',
            '/vaance/plugins/offlinejs/offline-language-english.css',
            '/vaance/plugins/select2-4.0.3/dist/css/select2.min.css',
            '/vaance/plugins/select2-4.0.3/dist/css/select2-bootstrap.css',
            '/vaance/plugins/select2-4.0.3/dist/css/pmd-select2.css',
            '/vaance/plugins/bootstrap-daterangepicker/daterangepicker.css',
            '/vaance/plugins/bootstrap-datetimepicker/dist/css/bootstrap-datetimepicker.min.css',
            '/vaance/plugins/jquery-datatable/yadcf/jquery.dataTables.yadcf.css',
            '/vaance/plugins/bootstrap-fileinput/css/fileinput.min.css',
            '/vaance/plugins/jquery-comments/css/jquery-comments.css',
            '/vaance/plugins/jquert-query-builder/css/query-builder.default.css',
            '/vaance/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css',
            '/vaance/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css',
            // '/vaance/scss/custom.css',
            ],
            '/storage/cache/css/main.min.css'
        ) !!}


    @stack('css')


    @include('partial.header_js')

    <!-- here -->


</head>

<body class="{{ Auth::user()->theme() }} @yield('body_class')">

<!-- Page Loader -->
@if(config('vaance.preloader_type') != 'none')
    <div class="page-loader-wrapper">
        <div class="loader">

            @if(config('vaance.preloader_type') == 'ball')
                <div style="color: #84a5dd; margin: 0 auto" class="la-ball-scale-multiple la-3x">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            @endif
                @if(config('vaance.preloader_type') == 'circle')
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
                @endif
            <p>@lang('core::core.please_wait')</p>
        </div>
    </div>
@endif
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

@include('partial.search-bar')
@include('partial.top-bar')
<section>


    @include('partial.left-sidebar')

    @include('partial.right-sidebar')
</section>

<section class="content">
    <div class="container-fluid">



        @include('flash::message')

        @yield('content')

    </div>
</section>


@include('partial.bottom_js')


@stack('scripts')
<script type="text/javascript" src="{{ asset('/vaance/js/VaanceLazyDatatable.js')}}"></script>

<div class="modal fade" id="genericModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 10080!important;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel"></h4>
            </div>

            <div class="modal-body ">

                    @if(isset($show_fields))
                    @foreach($show_fields as $panelName => $panel)
    
                        <div class="row">
                            {{ Html::section($language_file,$panelName) }}
    
                            <div class="panel-content">
                                @foreach($panel as $fieldName => $options)
    
                                    @if(isset($form) && $form->{$fieldName}!= null && !isset($options['hide_in_form']) && !isset($options['hide_in_create']))
                                        <div class="{{ isset($options['col-class']) ? $options['col-class'] : 'col-lg-6 col-md-6 col-sm-6 col-xs-6' }}">
    
                                            {!! form_row($form->{$fieldName}) !!}
                                        </div>
                                    @endif
    
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    @endif

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">@lang('core::core.CLOSE')</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="confirmlimit" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 10080!important;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Confirm
                </div>
                <div class="modal-body ">
                    <p>for value higher than 15 000 000 the Polizza will go under review</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success confirm">Confirm</button>
                    <button type="button" class="btn btn-error close" data-dismiss="modal">@lang('core::core.CLOSE')</button>
                </div>
            </div>
        </div>
    </div>
@include('announcement::announcement-message')

</body>
</html>
