@extends('layouts.app')

@section('content')

    <div class="row">

        @if($settingsMode)
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-vert-padding" >
                @include('settings::partial.menu')
            </div>
        @endif

        @if($settingsMode)
            <div  class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-vert-padding">
         @endif

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>

                            <div class="header-buttons">
                                @if($settingsBackRoute != '')
                                    <a href="{{ route($settingsBackRoute) }}" title="@lang('core::core.crud.back')" class="btn btn-default btn-crud">@lang('core::core.crud.back')</a>
                                @endif
                            </div>

                            @lang($language_file.'.title')
                            <small>@lang($language_file.'.description')</small>
                        </h2>
                    </div>
                    <div class="body">

                        <div class="row">

                            <div class="col-lg-12">

                            {!! form_start($form) !!}

                            @foreach($show_fields as $panelName => $panel)

                                <div class="collapsible">
                                    {{ Html::section($language_file,$panelName) }}

                                    <div class="panel-content">
                                        @foreach($panel as $fieldName => $options)

                                            @if(!isset($options['hide_in_form']))
                                                <div class="{{ isset($options['col-class']) ? $options['col-class'] : 'col-lg-6 col-md-6 col-sm-6 col-xs-6' }}">

                                                    {!! form_row($form->{$fieldName}) !!}
                                                </div>
                                            @endif

                                        @endforeach

                                    </div>
                                </div>

                            @endforeach



                            {!! form_end($form, $renderRest = true) !!}

                        </div>

                        </div>

                    </div>

                    </div>
                </div>
            </div>
            @if($settingsMode)
                </div>
            @endif
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
    @if($form_request)
{!! JsValidator::formRequest($form_request, '#settings_form') !!}
    @endif
@endpush
