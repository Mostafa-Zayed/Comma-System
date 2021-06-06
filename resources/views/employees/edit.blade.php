@extends('layout.app')
@php
    $types = ['super_admin','admin','manager','employee'];
    $method = 'edit';
@endphp
@section('title')
    {{ucwords($model." | ".$method) }}
@endsection
@section('datatable')
    <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title col-10">
                    <div class="col-12">
                        @include('includes.breadcrumb',['models' => $models,'model' => $model,'method' => $method,$row])
                    </div>
                </div>
                <div class="dropdown filter custom-dropdown-icon">
                    <a class="btn btn-secondary mb-4 mr-2" href="{{route($models.'.'.'create')}}">Create {{$model}}</a>
                </div>
            </div>
            <!-- Start Row -->
            <div class="row layout-top-spacing layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <div id="column-filter_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div id="basic" class="col-lg-12 layout-spacing">
                                            <div class="statbox widget box box-shadow">
                                                <div class="widget-header">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                            <h4>{{ucfirst($model)}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content widget-content-area">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12 mx-auto">
{{--                                                            @include($models.'.form')--}}
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
        </div>
    </div>
    <!-- End Row -->
    @include('includes.footer')

@endsection
@section('script')
    <script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>


    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
@endsection


