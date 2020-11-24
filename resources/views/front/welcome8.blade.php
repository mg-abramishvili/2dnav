
@extends('layouts.front')
@section('content')

    <div class="slider">
        @foreach($ads as $ad)
            @if (pathinfo($ad->adfile, PATHINFO_EXTENSION) == 'mp4')
                <div class="slider-slide">
                    <video nocontrols autoplay muted loop style="width:100%; height: 100%;">
                        <source src="{{$ad->adfile}}" type="video/mp4" />
                    </video>
                </div>
            @else
                <div class="slider-slide" style="background: url({{$ad->adfile}}); background-size: cover; background-position: 50% 50%;"></div>
            @endif
        @endforeach
    </div>

    <div class="categories-line"></div>
    <div class="categories">
        
        <div class="minislider">
            @foreach($adds as $add)
            @if (pathinfo($add->adfile, PATHINFO_EXTENSION) == 'mp4')
                <div class="minislider-slide">
                    <video nocontrols autoplay muted loop style="width:100%; height: 100%;">
                        <source src="{{$add->adfile}}" type="video/mp4" />
                    </video>
                </div>
            @else
                <div class="minislider-slide" style="background: url({{$add->adfile}}); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
            @endif
            @endforeach
        </div>
        <div class="catlist">
            <div class="catlist-list">
                @foreach($tags as $tag)
                    <div class="catlist-item">
                        <a href="/front-tags8/{{ $tag->id }}">
                            @foreach($tag->markimages as $markimage)
                                <img src="{{ $markimage->image }}">
                            @endforeach
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
                        @if(count($store->r08routes))
                        <div style="position: absolute; left: {{$store->x_01}}px; top: {{$store->y_01}}px; z-index:10; width: auto; height: auto; margin-left: -12px; margin-top: -12px;"><a href="/front-r08routes/@foreach($store->r08routes as $route){{$route->id}}@endforeach" style="display: block; padding: 5px; text-decoration: none; color: #fff; font-size: 10px; background: #ee3984; border-radius: 5px; box-shadow: 0 1px 16px rgba(0,0,0,0.5);">{{$store->title}}</a></div>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>

        
        </div>

<div class="search">
    <a href="/search8"><img src="/img/search.png"><span>Поиск</span></a>
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
            }, 250);
            setTimeout(function () {
                $("#sch1").trigger('click');
            }, 550);
            setTimeout(function () {
                $("#map").css('opacity', '1');
            }, 750);
            $("#sch1").focus();
        });
    </script>

    <script>
        $('.slider').flickity({
        cellAlign: 'left',
        contain: true,
        autoPlay: 5000,
        prevNextButtons: false,
        wrapAround: true
        });
    </script>

<script>
        $('.minislider').flickity({
        cellAlign: 'left',
        contain: true,
        autoPlay: 3000,
        prevNextButtons: false,
        pageDots: false,
        wrapAround: true
        });
    </script>

    <script>
        var divs = $(".catlist-list .catlist-item");
            for(var i = 0; i < divs.length; i+=6) {
            divs.slice(i, i+6).wrapAll("<div class='catlist-item-slide'></div>");
        }
    </script>

    <script>
        $('.catlist-list').flickity({
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        });
    </script>
    @endsection