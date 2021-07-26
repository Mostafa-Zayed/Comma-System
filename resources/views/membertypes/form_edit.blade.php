<form action="{{route('member-types.update',['member_type' => $row])}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'name'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{$input}) {{$row->{$input} }}@endisset">
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-12 mb-4">
            @php $input = 'days'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input type="number" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{$input}){{$row->$input}}@endisset">
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-md-12 mb-4">
            @php $input = 'price'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input type="number" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{$input}){{$row->$input}}@endisset">
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12">
            @php $input = 'status'; @endphp
            <label for="{{$input}}">{{ucwords($input)}}</label>
            <div id="select_menu" class="form-group mb-4">
                <select class="custom-select" name="{{$input}}">
                    <option value="on" @if($row->{$input} == 'on') selected @endif>On</option>
                    <option value="off" @if($row->{$input} == 'off') selected @endif>Off</option>
                </select>
                @error($input)
                <div class="invalid-feedback">
                    Please Select the field
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-row float-right">
        @php $input = 'edit'; @endphp
        <input class="btn btn-primary mb-4 mt-2 text-right" type="submit" value="{{$method}}" name="{{$input}}">
    </div>
</form>
