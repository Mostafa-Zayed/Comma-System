@php $method = $method === 'edit' ? 'update' : 'store' ;@endphp

<form action="{{route($models.'.'.$method,[strtolower($model) => isset($row) ? $row : ''])}}" method="post" enctype="multipart/form-data">
    @csrf
    @if($method === 'update') {{method_field('PUT')}}@endif
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'first name'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{str_replace(' ','',$input)}) {{ $row->{str_replace(' ','',$input)} }}@endisset {{old(str_replace(' ','',$input))}}">
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'last name'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{str_replace(' ','',$input)}) {{ $row->{str_replace(' ','',$input)} }}@endisset {{old(str_replace(' ','',$input))}}">
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
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="@isset($row->{str_replace(' ','',$input)}) {{ $row->{str_replace(' ','',$input)} }}@endisset {{old(str_replace(' ','',$input))}}">
            @error(str_replace('_','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'password'; @endphp
            <label for="{{$input}}">{{ucwords($input)}}</label>
            <input type="{{$input == 'password' ? $input : 'text'}}" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="">
            @error(str_replace('_','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    @php $input = 'image'; @endphp
    <div class="custom-file-container" data-upload-id="myFirstImage">
        <label>Upload (Single File) <a href="" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
        <label class="custom-file-container__custom-file" >
            <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="{{$input}}">
            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
            <span class="custom-file-container__custom-file__custom-file-control"></span>
        </label>
        <div class="custom-file-container__image-preview"></div>
        @isset($row)
            @if(! empty($row->image))
                <div class="custom-file-container__image-preview">
                    <img src="{{URL::to('uploads/employees/'.$row->image)}}" width="70%" height="100%">
                </div>
            @endif
        @endisset
    </div>
    <div class="form-row">
        <div class="col-md-12">
            @php $input = 'type'; @endphp
            <label for="{{$input}}">{{ucwords($input)}}</label>
            <div id="select_menu" class="form-group mb-4">
                <select class="custom-select" name="{{$input}}">
                    <option value="">Open this select menu</option>
                    @foreach($types as $type)
                        <option value="{{$type}}" @if(isset($row) && $row->{str_replace(' ','',$input)} === $type) selected @endif>{{ucwords(str_replace('_',' ',$type))}}</option>
                    @endforeach
                </select>
                <div class="valid-feedback">Example valid custom select feedback</div>
                <div class="invalid-feedback">
                    Please Select the field
                </div>
            </div>
            @error(str_replace('_','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12">
            @php $input = 'active'; @endphp
            <label for="{{$input}}">{{ucwords($input)}}</label>
            <div class="col-md-10 float-right">
                <label class="switch s-icons s-outline s-outline-primary mr-2">
                    <input type="checkbox" @isset($row) {{$row->active === 'on' ? 'checked' : ''}}@endisset name="{{$input}}">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="form-row float-right">
        @php $input = 'create'; @endphp
        <input class="btn btn-primary mb-4 mt-2 text-right" type="submit" value="{{$method}}" name="{{$input}}">
    </div>

</form>
