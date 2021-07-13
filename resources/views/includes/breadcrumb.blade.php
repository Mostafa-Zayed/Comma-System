<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route($models.'.index')}}">{{ucfirst($models)}}</a></li>
<<<<<<< HEAD
        <li class="breadcrumb-item" aria-current="page">{{ucfirst($method)}} : @isset($row->id) {{$row->id}}@endisset</li>
=======
        <li class="breadcrumb-item" aria-current="page">{{ucfirst($method)}}</li>
>>>>>>> bf3fedc302fe4e102757998e78df889d7ebedb53
    </ol>
</nav>
