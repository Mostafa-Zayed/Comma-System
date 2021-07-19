<form action="{{route($models.'.update',[strtolower($model) => $row])}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="form-row">
        <div class="col-md-6 mb-4">
            @php $input = 'client_id'; @endphp
            <label for="{{$input}}">Client Name :</label>
            <input type="text" class="form-control" id="{{$input}}" name="{{$input}}" value="@isset($row->client) {{$row->client->name}}@endisset">
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-6 mb-4">
            @php $input = 'type_id'; @endphp
            <label for="{{$input}}">Type Name :</label>
            <select class="form-control  basic" name="{{$input}}[]" id='{{$input}}'>
                <option disabled selected>Type Name :</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}" @if($type->id == $row->type->id) selected @endif>{{$type->name}}</option>
                @endforeach
            </select>
            @error($input)
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-4">
                @php $input = 'start'; @endphp
                <label for="{{$input}}">Date Session Started :</label>
                <input type="text" class="form-control" id="{{$input}}" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input}->toDayDateTimeString()}}@endisset" disabled>
{{--                <input type="text" class="form-control" id="{{$input}}" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input}->format('Y:F:l')}}@endisset">--}}
                @error($input)
                <div class="invalid-feedback" style="display: block;">
                    {{$message}}
                </div>
                @enderror
            </div>

        <div class="col-md-6 mb-4">
            @php $input = 'employee_id'; @endphp
            <label for="{{$input}}">Employee Name :</label>
            <input type="text" class="form-control" id="{{$input}}" name="{{$input}}" value="@isset($row->employee) {{$row->employee->firstname}}@endisset" disabled>
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    @if(! empty($row->end))
        <div class="form-row">
            <h4><strong>{{ucfirst($row->status)}}</strong></h4>
            <div class="col-md-12 mb-4">
                <div class="alert alert-success">
                    <div class="input-group mb-3">
                        @php $input = 'end'; @endphp
                        <span class="input-group-text" id="basic-addon1">Date Session End :</span>
                        <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input}->toDayDateTimeString()}}@endisset" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="alert alert-success">
                    <div class="input-group mb-3">
                        @php $input = 'quantity'; @endphp
                        <span class="input-group-text" id="basic-addon1">Total Hours :</span>
                        <input type="text" class="form-control"  aria-describedby="basic-addon1" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input} }}@endisset" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="alert alert-success">
                    <div class="input-group mb-3">
                        @php $input = 'product'; @endphp
                        <span class="input-group-text" id="basic-addon1">Total Products :</span>
                        <input type="text" class="form-control"  aria-describedby="basic-addon1" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input} }}@endisset" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="alert alert-success">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Hour Price:</span>
                        <input type="text" class="form-control"  aria-describedby="basic-addon1" name="price" value="@isset($row->type->price) {{$row->type->price }}@endisset" disabled>
                    </div>
                    <div class="input-group mb-3">
                        @php $input = 'total'; @endphp
                        <span class="input-group-text" id="basic-addon1">Total :</span>
                        <input type="text" class="form-control"  aria-describedby="basic-addon1" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input} }}@endisset" disabled>
                    </div>
                </div>
{{--                <div class="alert alert-success col-md-4">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            @php $input = 'quantity'; @endphp--}}
{{--                            <span class="input-group-text" id="basic-addon1">Total Hours :</span>--}}
{{--                            <input type="text" class="form-control"  aria-describedby="basic-addon1" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input} }}@endisset" disabled>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="alert alert-success col-md-4">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            @php $input = 'quantity'; @endphp--}}
{{--                            <span class="input-group-text" id="basic-addon1">Total Hours :</span>--}}
{{--                            <input type="text" class="form-control"  aria-describedby="basic-addon1" name="{{$input}}" value="@isset($row->{$input}) {{$row->{$input} }}@endisset" disabled>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    @endif
{{--    <div class="form-row">--}}
{{--        <div class="col-md-12 mb-4">--}}
{{--            @php $input = 'name'; @endphp--}}
{{--            <label for="{{$input}}">{{ucwords($input)}}</label>--}}
{{--            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{str_replace(' ','',$input)}) {{ $row->{str_replace(' ','',$input)} }}@endisset {{old(str_replace(' ','',$input))}}">--}}
{{--            @error(str_replace(' ','',$input))--}}
{{--            <div class="invalid-feedback" style="display: block;">--}}
{{--                {{$message}}--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="form-row">--}}
{{--        <div class="col-md-6 mb-4">--}}
{{--            @php $input = 'day'; @endphp--}}
{{--            <label for="e_mail">{{ucwords($input)}}</label>--}}
{{--            <input id="day" value="<?= date('Y-m-d'); ?>" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." readonly="readonly" name="day">--}}
{{--            @error(str_replace(' ','',$input))--}}
{{--            <div class="invalid-feedback" style="display: block;">--}}
{{--                {{$message}}--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <div class="col-md-6 mb-4">--}}
{{--            @php $input = 'hour'; @endphp--}}
{{--            <label for="e_mail">{{ucwords($input)}}</label>--}}
{{--            <input id="hour" value="<?= date('h:i:m'); ?>" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." readonly="readonly" name="hour">--}}
{{--            @error(str_replace(' ','',$input))--}}
{{--            <div class="invalid-feedback" style="display: block;">--}}
{{--                {{$message}}--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-row">--}}
{{--        <div class="col-md-12 mb-4">--}}
{{--            @php $input = 'type_id'; @endphp--}}
{{--            <label for="e_mail">{{ucwords('Department')}}</label>--}}
{{--            <select class="form-control  basic" name="{{$input}}">--}}
{{--                @foreach($types as $type)--}}
{{--                    <option value="{{$type->id}}">{{ucfirst($type->name)}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            @error(str_replace(' ','',$input))--}}
{{--            <div class="invalid-feedback" style="display: block;">--}}
{{--                {{$message}}--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="form-row float-right">--}}
{{--        @php $input = 'update'; @endphp--}}
{{--        <input class="btn btn-primary mb-4 mt-2 text-right" type="submit" value="{{$input}}" name="{{$input}}">--}}
{{--    </div>--}}

</form>
