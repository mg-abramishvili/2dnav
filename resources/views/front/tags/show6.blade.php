@extends('layouts.front')
@section('content')

    <div class="catlist-list catlist-list2" style="padding: 0 20px;">
        @foreach($tagsall as $tagallitem)
            <div class="catlist-item">
                <a href="/front-tags2/{{ $tagallitem->id }}">
                    <img src="/img/catlist01.png">
                    <p>{{ $tagallitem->title }}</p>
                </a>
            </div>
        @endforeach
    </div>

    <h1 style="margin: 80px 30px; text-transform: uppercase; color: #fff; font-size: 60px; font-weight: 700;">{{ $tag->title }}</h1>

    @if(sizeof($tag->store) > 0)
        <ul class="tag-page-list">
            @foreach($tag->store as $store)
                @if(count($store->r06routes))
                    <li><a href="@if(count($store->r06routes))/front-r06routes/@foreach($store->r06routes as $route){{$route->id}}@endforeach @endif">{{$store->title}}</a></li>
                @endif
            @endforeach
        </ul>
    @endif

    <div class="footer">
        <a href="/6"><img src="/img/home.png"/></a>
    </div>

    @endsection

    @section('scripts')
        <script>
            $('.catlist-list').flickity({
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            });
        </script>
    @endsection