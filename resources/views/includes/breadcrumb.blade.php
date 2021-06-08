<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route($models.'.'.$method)}}">{{ucfirst($models)}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ucfirst($method)}}</li>
    </ol>
</nav>
