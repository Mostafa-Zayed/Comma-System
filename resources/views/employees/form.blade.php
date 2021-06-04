<form action="{{route($models.'.store')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'first name'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="{{old(str_replace(' ','',$input))}}">
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
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="{{old(str_replace(' ','',$input))}}">
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
            <input type="text" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="{{old(str_replace(' ','',$input))}}">
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
            <input type="{{$input == 'password' ? $input : 'text'}}" class="form-control" id="{{str_replace(' ','',$input)}}" name="{{str_replace(' ','',$input)}}" value="{{old(str_replace(' ','',$input))}}">
            @error(str_replace('_','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12">
            @php $input = 'type'; @endphp
            <label for="{{$input}}">{{ucwords($input)}}</label>
            <div id="select_menu" class="form-group mb-4">
                <select class="custom-select" name="{{$input}}">
                    <option value="">Open this select menu</option>
                    @foreach($types as $type)
                        <option value="{{$type}}">{{ucwords(str_replace('_',' ',$type))}}</option>
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
                    <input type="checkbox" checked name="active">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="form-row float-right">
        @php $input = 'create'; @endphp
        <input class="btn btn-primary mb-4 mt-2 text-right" type="submit" value="{{$input}}" name="{{$input}}">
    </div>

</form>
