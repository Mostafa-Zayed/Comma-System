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
                            <th>#</th>
                            <th class="" colspan="2">Start</th>
                            <th>Department</th>
                            <th class="">End</th>
                            <th class="">Client Name</th>
                            <th>End Session</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach($rows as $row)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$row->start->format('d/m/Y h:i')}}</td>
                            <td>{{$row->start->diffForHumans()}}</td>
                            <td>{{$row->type->name}}</td>
                            @empty($row->end)
                            <td>
                                <button class="btn btn-warning disabled">Not Finished</button>
                            </td>
                            @endempty
                            @if(! empty($row->end))
                            <td>
                                <button class="btn btn-danger disabled">{{date('d-m-Y', strtotime($row->end))}}</button>
                            </td>
                            @endif
                            <td>
                                @isset($row->client->name)
                                {{$row->client->name}}
                                @endisset
                            </td>
                            <td>
                                <button class="btn btn-danger" id="{{$row->id}}"> End Session</button>
                                <form action=" {{route('sessions.end',['session' => $row->id])}}" method="post" id="{{$row->id}}" style="display: none;">
                                    @csrf
                                    <input type="text" name='product' class="form-control">
                                    <br>
                                    <input type="submit" name="end" value="Add Price" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th class="" colspan="2">Start</th>
                        <th>Department</th>
                        <th class="">End</th>
                        <th class="">Client Name</th>
                        <th>End Session</th>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
