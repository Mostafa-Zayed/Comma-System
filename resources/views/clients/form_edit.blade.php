<form action="{{route($models.'.update',[strtolower($model) => $row])}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'name'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{str_replace(' ','',$input)}) {{ $row->{str_replace(' ','',$input)} }}@endisset">
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'email'; @endphp
            <label for="{{$input}}">{{ucwords($input)}}</label>
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{str_replace(' ','',$input)}) {{ $row->{str_replace(' ','',$input)} }}@endisset">
            @error(str_replace('_','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    {{--    <div class="form-row">--}}
    {{--        <div class="col-md-12">--}}
    {{--            @php $input = 'status'; @endphp--}}
    {{--            <label for="{{$input}}">{{ucwords($input)}}</label>--}}
    {{--            <div class="col-md-10 float-right">--}}
    {{--                <label class="switch s-icons s-outline s-outline-primary mr-2">--}}
    {{--                    <input type="checkbox" @isset($row) {{$row->status === 'on' ? 'checked' : ''}}@endisset name="{{$input}}">--}}
    {{--                    <span class="slider"></span>--}}
    {{--                </label>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="form-row float-right">
        @php $input = 'update'; @endphp
        <input class="btn btn-primary mb-4 mt-2 text-right" type="submit" value="{{ucfirst($input)}}" name="{{$input}}">
    </div>

</form>
