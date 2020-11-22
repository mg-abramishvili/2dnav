
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
                <div class="catlist-item">
                    <img src="/img/catlist01.png">
                    <p>Одежда</p>
                </div>
                <div class="catlist-item">
                    <img src="/img/catlist02.png">
                    <p>Развлечения</p>
                </div>
                <div class="catlist-item">
                    <img src="/img/catlist03.png">
                    <p>Электроника</p>
                </div>
                <div class="catlist-item">
                    <img src="/img/catlist04.png">
                    <p>Продукты</p>
                </div>
                <div class="catlist-item">
                    <img src="/img/catlist05.png">
                    <p>Обувь</p>
                </div>
                <div class="catlist-item">
                    <img src="/img/catlist06.png">
                    <p>Кафе и рестораны</p>
                </div>
            </div>
        </div>
    </div>
    <div class="categories-line"></div>

    <div>
        <div class="wrapper" id="wrapper">
            <div id="wrapper-inner">
            
            <div class="map map-image" id="map">

                <ul class="index-map-list">
                    @foreach($schemes as $scheme)
                    <li>
                        <button id="sch{{$scheme->id}}">{{$scheme->title}}</button>
                    </li>
                    <script>
                        $("#sch{{$scheme->id}}").click(function(){
                        $(".sch").hide();
                        $(".sch{{$scheme->id}}").show();
                        panzoom.reset();
                        setTimeout(function () {
                        panzoom.reset();
                        }, 250)
                        });        
                    </script>
                    @endforeach
                </ul>
                
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