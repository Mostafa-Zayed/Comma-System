@extends('layout.app')
@php $method = 'index';@endphp
@section('title')
    {{ucwords($model) }}
@endsection
@section('datatable')
    <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title col-10">
                    <div class="col-12">
                        @include('includes.breadcrumb',['models' => $models,'model' => $model,'method' => $method])
                    </div>
                </div>
                <div class="dropdown filter custom-dropdown-icon">
                    <a class="btn btn-secondary mb-4 mr-2" href="{{route($models.'.create')}}">Create {{$model}}</a>
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
                                            @include('clients.table',['models' => $models,'rows' => $rows])
                                        </div>
                                        <div class="row">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Row -->
            @include('includes.footer')
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
@endsection
