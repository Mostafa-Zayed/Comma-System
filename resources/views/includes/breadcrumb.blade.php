<nav class="breadcrumb-two" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{route($models.'.index')}}">{{ucfirst($models)}}</a></li>
        @if($method == 'edit' || $method === 'show')
            <li class="breadcrumb-item active"><a href="{{route($models.'.'.$method,[strtolower($model) => $row])}}">{{ucfirst($method)}}</a></li>
        @else
            <li class="breadcrumb-item" aria-current="page">{{ucfirst($method)}}</li>
        @endif
    </ol>
</nav>
