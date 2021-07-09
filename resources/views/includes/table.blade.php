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
                            <th class="" colspan="2">Start</th>
                            <th>Department</th>
                            <th class="">End</th>
                            <th class="">Client Name</th>
                            <th>End Session</th>
                            {{-- <th class="" colspan="2">Active</th>--}}
                            {{-- <th class="text-center">Actions</th>--}}
                            {{-- <th class="checkbox-column">--}}
                            {{-- <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">--}}
                            {{-- <input type="checkbox" class="new-control-input todochkbox" id="todoAll">--}}
                            {{-- <span class="new-control-indicator"></span>--}}
                            {{-- </label>--}}
                            {{-- </th>--}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                        <tr>
                            <td>{{$row->start}}</td>
                            <td>{{$row->created_at->diffForHumans()}}</td>
                            <td>{{$row->type->name}}</td>
                            @empty($row->end)
                            <td>
                                <button class="btn btn-warning">Not Finished</button>
                            </td>
                            @endempty
                            @if(! empty($row->end))
                            <td>
                                <button class="btn btn-danger">{{date('d-m-Y', strtotime($row->end))}}</button>
                            </td>
                            @endif
                            <td>
                                @isset($row->client->name)
                                {{$row->client->name}}
                                @endisset
                            </td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <input type="text" name="" </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th class="" colspan="2">Start</th>
                        <th>Department</th>
                        <th class="">End</th>
                        <th class="">Client Name</th>
                        {{-- <th class="" colspan="2">Active</th>--}}
                        {{-- <th class="text-center">Actions</th>--}}
                        {{-- <th class="checkbox-column">--}}
                        {{-- <button class="btn btn-danger">Delete</button>--}}
                        {{-- </th>--}}
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>