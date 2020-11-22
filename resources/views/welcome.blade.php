
@extends('layouts.front')
@section('content')

    <div class="slider">
        <div class="slider-slide" style="background: url(/img/slide.jpg); background-size: cover; background-position: 50% 50%;"></div>
    </div>

    <div class="categories-line"></div>
    <div class="categories">
        
        <div class="minislider">
            <div class="minislider-slide" style="background: url(/img/zara.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
        </div>
        <div class="catlist">
            <div class="catlist-list">
                @foreach($tags as $tag)
                    <div class="catlist-item">
                        <a href="/front-tags/{{ $tag->id }}">
                            <img src="/img/catlist01.png">
                            <p>{{ $tag->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="categories-line"></div>

    <div>
        <div class="wrapper" id="wrapper">

        <ul class="index-map-list">
                    @foreach($schemes as $scheme)
                    <li>
                        <button id="sch{{$scheme->id}}">{{$scheme->title}}</button>
                    </li>
                    <script>
                        $("#sch{{$scheme->id}}").click(function(){
                        $(".sch").hide();
                        $("#map").css('opacity', '0');
                        $(".sch{{$scheme->id}}").show();
                        panzoom.reset();
                        setTimeout(function () {
                        panzoom.reset();
                        }, 250);
                        setTimeout(function () {
                            $("#map").css('opacity', '1');
                        }, 550);
                        });        
                    </script>
                    @endforeach
                </ul>

            <div id="wrapper-inner">
            
            <div class="map map-image" id="map">
                
                @foreach($schemes as $scheme)
                <div class="sch sch{{$scheme->id}}">
                <img src="{{$scheme->image}}"/>
                    @foreach($scheme->marks as $mark)
                        <div style="position: absolute; left: {{$mark->x_01}}px; top: {{$mark->y_01}}px; z-index:10; width: 20px; height: 20px; background: url(@foreach($mark->markimages as $markimage){{$markimage->image}}@endforeach) center center; background-size: contain; background-repeat: no-repeat;"></div>
                    @endforeach
                    @foreach($scheme->store as $store)
                        @if(count($store->routes))
                        <div style="position: absolute; left: {{$store->x_01}}px; top: {{$store->y_01}}px; z-index:10; width: 20px; height: 20px; background: red;"><a href="/front-routes/@foreach($store->routes as $route){{$route->id}}@endforeach">{{$store->title}}</a></div>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>

        </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
        $(document).ready(function(){
            //$(".routesbox").hide();
            $("#map").css('opacity', '0');
            setTimeout(function () {
                $("#sch2").trigger('click');
            }, 250)
            setTimeout(function () {
                $("#sch1").trigger('click');
            }, 550)
            setTimeout(function () {
                $("#map").css('opacity', '1');
            }, 750)
        });
    </script>
    @endsection