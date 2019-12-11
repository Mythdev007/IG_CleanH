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
                            @lang($language_file.'.module')
                            <small>@lang($language_file.'.module_description')</small>
                        </div>

                    </h2>

                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12">


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


