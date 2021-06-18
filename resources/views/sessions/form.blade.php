<form action="{{route($models.'.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'client_id'; @endphp
            <label for="{{$input}}">{{ucwords('Client Id')}}</label>
            <select class="form-control  basic" name="{{$input}}[]">
                <option disabled selected>Search By Ssn</option>
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->ssn}}</option>
                @endforeach
            </select>
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'client_id'; @endphp
            <label for="{{$input}}">{{ucwords('Client Name')}}</label>
            <select class="form-control  basic" name="{{$input}}[]" id='{{$input}}'>
                <option disabled selected>Search By Name</option>
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'name'; @endphp
            <label for="{{$input}}">{{ucwords($input)}}</label>
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
            @php $input = 'start'; @endphp
            <label for="e_mail">{{ucwords($input)}}</label>
            <input id="dateTimeFlatpickr" value="<?= date('Y-m-d h:m'); ?>" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." readonly="readonly" name="start">
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-4">
            @php $input = 'type_id'; @endphp
            <label for="e_mail">{{ucwords('Department')}}</label>
            <select class="form-control  basic" name="{{$input}}">
                @foreach($types as $type)
                <option value="{{$type->id}}">{{ucfirst($type->name)}}</option>
                @endforeach
            </select>
            @error(str_replace(' ','',$input))
            <div class="invalid-feedback" style="display: block;">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-row float-right">
        @php $input = 'create'; @endphp
        <input class="btn btn-primary mb-4 mt-2 text-right" type="submit" value="{{$input}}" name="{{$input}}">
    </div>

</form>