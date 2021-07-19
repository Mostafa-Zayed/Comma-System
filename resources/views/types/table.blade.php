<div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ucfirst($models)}}</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    @if(! empty($rows) && $rows->count() > 0 )
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th class="">Name</th>
                            <th class="">Price</th>
{{--                            <th class="" colspan="2">Status</th>--}}
                            <th class="">Status</th>
                            <th class="text-center">Actions</th>
{{--                            <th class="checkbox-column">--}}
{{--                                <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">--}}
{{--                                    <input type="checkbox" class="new-control-input todochkbox" id="todoAll">--}}
{{--                                    <span class="new-control-indicator"></span>--}}
{{--                                </label>--}}
{{--                            </th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->price}}</td>
                                <td>
                                    @if($row->status == 'on')
                                        <span class="shadow-none badge badge-success">Active</span>
                                    @else
                                        <span class="shadow-none badge badge-danger">Not Active</span>
                                    @endif
                                </td>
{{--                                <td class="checkbox-column text-center">--}}
{{--                                    <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">--}}
{{--                                        <input type="checkbox" class="new-control-input" @if($row->status === 'on') checked @endisset>--}}
{{--                                        <span class="new-control-indicator"></span>--}}
{{--                                    </label>--}}
{{--                                </td>--}}
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="{{route($models.'.show',[strtolower($model) => $row])}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="far fa-eye text-primary"></i></a> </li>
                                        &nbsp;&nbsp;
                                        <li><a href="{{route($models.'.edit',[strtolower($model) => $row])}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                        &nbsp;&nbsp;
                                        <li>
                                            <form action="{{route($models.'.destroy',[strtolower($model) => $row])}}" method="post">
                                                @csrf
                                                {{method_field('DELETE ')}}
                                                <button type="submit" style="border: none; outline: none"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
{{--                                <td class="checkbox-column">--}}
{{--                                    <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">--}}
{{--                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-4">--}}
{{--                                        <span class="new-control-indicator"></span>--}}
{{--                                    </label>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <th>ID</th>
                        <th class="">Name</th>
                        <th class="">Price</th>
{{--                        <th class="" colspan="2">Status</th>--}}
                        <th class="">Status</th>
                        <th class="text-center">Actions</th>
{{--                        <th class="checkbox-column">--}}
{{--                            <button class="btn btn-danger">Delete</button>--}}
{{--                        </th>--}}
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
