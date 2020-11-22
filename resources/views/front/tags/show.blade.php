@extends('layouts.front')
@section('content')

    {{ $tag->title }}

    @if(sizeof($tag->store) > 0)
        <ul>
            @foreach($tag->store as $store)
                @if(count($store->routes))
                    <li><a href="@if(count($store->routes))/front-routes/@foreach($store->routes as $route){{$route->id}}@endforeach @endif">{{$store->title}}</a></li>
                @endif
            @endforeach
        </ul>
    @endif

@endsection