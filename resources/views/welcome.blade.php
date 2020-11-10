<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DreamApp Navigator</title>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/flickity.pkgd.min.js"></script>
        <script src="/js/panzoom.js"></script>

        <link rel="stylesheet" href="/css/flickity.css">
        <link rel="stylesheet" href="/css/style.css">

    </head>
    <body>

<div class="container">

<div class="ads">
    <video id="myvideo" nocontrols autoplay>
        <source class="active" src="http://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" />
        @foreach($ads as $ad)
            @if (pathinfo($ad->adfile, PATHINFO_EXTENSION) == 'mp4')
            <source src="{{$ad->adfile }}" type="video/mp4" />
            @endif
        @endforeach
    </video>

    <script>
        var myvid = document.getElementById('myvideo');

        myvid.addEventListener('ended', function(e) {
        // get the active source and the next video source.
        // I set it so if there's no next, it loops to the first one
        var activesource = document.querySelector("#myvideo source.active");
        var nextsource = document.querySelector("#myvideo source.active + source") || document.querySelector("#myvideo source:first-child");
        
        // deactivate current source, and activate next one
        activesource.className = "";
        nextsource.className = "active";
        
        // update the video source and play
        myvid.src = nextsource.src;
        myvid.play();
        });    
    </script>
</div>

<!--<button id="zoomin">+</button>
<button id="zoomout">-</button>-->

<div class="list">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск ...">
    <div id="myKeyboard" class="modal">
        <div class="modal-content">
            <!--<span class="close">&times;</span>-->
            <div class="veteran-list-keyboard">
                <div class="keyboard">
                    <div style="text-align: center;">
                        <div class="k-eng">
                        <!--<button value="1" id="v28">1</button>
                        <button value="2" id="v29">2</button>
                        <button value="3" id="v30">3</button>
                        <button value="4" id="v31">4</button>
                        <button value="5" id="v32">5</button>
                        <button value="6" id="v33">6</button>
                        <button value="7" id="v34">7</button>
                        <button value="8" id="v35">8</button>
                        <button value="9" id="v36">9</button>
                        <button value="0" id="v37">0</button>
                        <button value="@" id="v41">@</button>
                        <br>-->
                        <button value="Q" id="v18">Q</button>
                        <button value="W" id="v24">W</button>
                        <button value="E" id="v5">E</button>
                        <button value="R" id="v19">R</button>
                        <button value="T" id="v21">T</button>
                        <button value="Y" id="v26">Y</button>
                        <button value="U" id="v22">U</button>
                        <button value="I" id="v9">I</button>
                        <button value="O" id="v16">O</button>
                        <button value="P" id="v17">P</button>
                        <br>
                        <button value="A" id="v1">A</button>
                        <button value="S" id="v20">S</button>
                        <button value="D" id="v4">D</button>
                        <button value="F" id="v6">F</button>
                        <button value="G" id="v7">G</button>
                        <button value="H" id="v8">H</button>
                        <button value="J" id="v10">J</button>
                        <button value="K" id="v11">K</button>
                        <button value="L" id="v13">L</button>
                        <br>
                        <button value="Z" id="v27">Z</button>
                        <button value="X" id="v25">X</button>
                        <button value="C" id="v3">C</button>
                        <button value="V" id="v23">V</button>
                        <button value="B" id="v2">B</button>
                        <button value="N" id="v15">N</button>
                        <button value="M" id="v14">M</button>
                        <!--<button value="." id="v38">.</button>
                        <button value="-" id="v39">-</button>
                        <button value="_" id="v40">_</button>-->
                        <br>
                    </div>
                    <div class="k-rus">
                        <button value="Й" id="rv01">Й</button>
                        <button value="Ц" id="rv02">Ц</button>
                        <button value="У" id="rv03">У</button>
                        <button value="К" id="rv04">К</button>
                        <button value="Е" id="rv05">Е</button>
                        <button value="Н" id="rv06">Н</button>
                        <button value="Г" id="rv07">Г</button>
                        <button value="Ш" id="rv08">Ш</button>
                        <button value="Щ" id="rv09">Щ</button>
                        <button value="З" id="rv10">З</button>
                        <button value="Х" id="rv11">Х</button>
                        <button value="Ъ" id="rv12">Ъ</button>
                        <br>
                        <button value="Ф" id="rv13">Ф</button>
                        <button value="Ы" id="rv14">Ы</button>
                        <button value="В" id="rv15">В</button>
                        <button value="А" id="rv16">А</button>
                        <button value="П" id="rv17">П</button>
                        <button value="Р" id="rv18">Р</button>
                        <button value="О" id="rv19">О</button>
                        <button value="Л" id="rv20">Л</button>
                        <button value="Д" id="rv21">Д</button>
                        <button value="Ж" id="rv22">Ж</button>
                        <button value="Э" id="rv23">Э</button>
                        <br>
                        <button value="Я" id="rv24">Я</button>
                        <button value="Ч" id="rv25">Ч</button>
                        <button value="С" id="rv26">С</button>
                        <button value="М" id="rv27">М</button>
                        <button value="И" id="rv28">И</button>
                        <button value="Т" id="rv29">Т</button>
                        <button value="Ь" id="rv30">Ь</button>
                        <button value="Б" id="rv31">Б</button>
                        <button value="Ю" id="rv32">Ю</button>
                        <!--<button value="." id="v38">.</button>
                        <button value="-" id="v39">-</button>
                        <button value="_" id="v40">_</button>-->
                        <br>
                    </div>
                        <button class="globebutton" style="width: 220px;">RU/EN</button>
                        <button value="" id="backspace">&#x2190</button>
                        <button value="" id="clear">&times;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $(".routesbox").hide();
        panzoom.reset();
        setTimeout(function () {
            panzoom.reset();
        }, 250);
    });
    </script>

    <ul id="myUL">
        @foreach($stores as $store)
        <li>
            <a id="@foreach($store->routes as $route)route{{$route->id}}@endforeach">
                <strong>{{ $store->title }}</strong>
                @foreach($store->tags as $tag)
                <span>{{ $tag->title }}</span>
                @endforeach
            </a>
        </li>

        <script>
            $("#@foreach($store->routes as $route)route{{$route->id}}@endforeach").click(function(){
                $(".routesbox").hide();
                $(".map-image").hide();
                $(".@foreach($store->routes as $route)route{{$route->id}}@endforeach").show();
                $(".@foreach($store->routes as $route)map-image{{$route->id}}@endforeach").show();
                panzoom.reset();
                setTimeout(function () {
                    panzoom.reset();
                }, 250)
            });        
        </script>

        @endforeach
      </ul>
</div>


<div>
    <div class="wrapper" id="wrapper">
        <div id="wrapper-inner">

        @foreach($routes as $route)
        
        <div class="map map-image map-image{{ $route->id }}" id="map">
            <div class="slide">
                @foreach($route->schemes as $scheme)
                <img src="{{$scheme->image}}"/>
                    @foreach($scheme->marks as $mark)
                        <div style="position: absolute; left: {{$mark->x_01}}px; top: {{$mark->y_01}}px; z-index:10; width: 20px; height: 20px; background: url(@foreach($mark->markimages as $markimage){{$markimage->image}}@endforeach) center center; background-size: contain; background-repeat: no-repeat;"></div>
                    @endforeach
                @endforeach

                <div class="routesbox route{{ $route->id }}">
                    <svg class="map-path" viewBox="0 0 800 450">
                        @empty(!$route->x_01)
                        <path class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_01 }} {{ $route->y_01 }}, undefined undefined"></path>
                        <circle id="01" cx="{{ $route->x_01 }}" cy="{{ $route->y_01 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_01 }}' y='{{ $route->y_01 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_02)
                        <path class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_02 }} {{ $route->y_02 }}, {{ $route->x_01 }} {{ $route->y_01 }}"></path>
                        <circle id="02" cx="{{ $route->x_02 }}" cy="{{ $route->y_02 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_02 }}' y='{{ $route->y_02 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_03)
                        <path class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_03 }} {{ $route->y_03 }}, {{ $route->x_02 }} {{ $route->y_02 }}"></path>
                        <circle id="03" cx="{{ $route->x_03 }}" cy="{{ $route->y_03 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_03 }}' y='{{ $route->y_03 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_04)
                        <path class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_04 }} {{ $route->y_04 }}, {{ $route->x_03 }} {{ $route->y_03 }}"></path>
                        <circle id="03" cx="{{ $route->x_04 }}" cy="{{ $route->y_04 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_04 }}' y='{{ $route->y_04 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_05)
                        <path class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_05 }} {{ $route->y_05 }}, {{ $route->x_04 }} {{ $route->y_04 }}"></path>
                        <circle id="03" cx="{{ $route->x_05 }}" cy="{{ $route->y_05 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_05 }}' y='{{ $route->y_05 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_06)
                        <path class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_06 }} {{ $route->y_06 }}, {{ $route->x_05 }} {{ $route->y_05 }}"></path>
                        <circle id="03" cx="{{ $route->x_06 }}" cy="{{ $route->y_06 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_06 }}' y='{{ $route->y_06 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_07)
                        <path class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_07 }} {{ $route->y_07 }}, {{ $route->x_06 }} {{ $route->y_06 }}"></path>
                        <circle id="03" cx="{{ $route->x_07 }}" cy="{{ $route->y_07 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_07 }}' y='{{ $route->y_07 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_08)
                        <path class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_08 }} {{ $route->y_08 }}, {{ $route->x_07 }} {{ $route->y_07 }}"></path>
                        <circle id="03" cx="{{ $route->x_08 }}" cy="{{ $route->y_08 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_08 }}' y='{{ $route->y_08 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_09)
                        <path class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_09 }} {{ $route->y_09 }}, {{ $route->x_08 }} {{ $route->y_08 }}"></path>
                        <circle id="03" cx="{{ $route->x_09 }}" cy="{{ $route->y_09 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_09 }}' y='{{ $route->y_09 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_10)
                        <path class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_10 }} {{ $route->y_10 }}, {{ $route->x_09 }} {{ $route->y_09 }}"></path>
                        <circle id="03" cx="{{ $route->x_10 }}" cy="{{ $route->y_10 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_10 }}' y='{{ $route->y_10 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_11)
                        <path class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_11 }} {{ $route->y_11 }}, {{ $route->x_10 }} {{ $route->y_10 }}"></path>
                        <circle id="03" cx="{{ $route->x_11 }}" cy="{{ $route->y_11 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_11 }}' y='{{ $route->y_11 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_12)
                        <path class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_12 }} {{ $route->y_12 }}, {{ $route->x_11 }} {{ $route->y_11 }}"></path>
                        <circle id="03" cx="{{ $route->x_12 }}" cy="{{ $route->y_12 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_12 }}' y='{{ $route->y_12 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty
                    </svg>
                </div>
            </div>
            @if(count($route->schemes2))
            <div class="slide">
                @foreach($route->schemes2 as $scheme2)
                <img src="{{$scheme2->image}}"/>
                    @foreach($scheme2->marks as $mark2)
                        <div style="position: absolute; left: {{$mark2->x_01}}px; top: {{$mark2->y_01}}px; z-index:10; width: 20px; height: 20px; background: url(@foreach($mark2->markimages as $markimage2){{$markimage2->image}}@endforeach) center center; background-size: contain; background-repeat: no-repeat;"></div>
                    @endforeach
                @endforeach

                <div class="routesbox route{{ $route->id }}">
                    <svg class="map-path" viewBox="0 0 800 450">
                        @empty(!$route->x_101)
                        <path class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_101 }} {{ $route->y_101 }}, undefined undefined"></path>
                        <circle id="01" cx="{{ $route->x_101 }}" cy="{{ $route->y_101 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_101 }}' y='{{ $route->y_101 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_102)
                        <path class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_102 }} {{ $route->y_102 }}, {{ $route->x_101 }} {{ $route->y_101 }}"></path>
                        <circle id="02" cx="{{ $route->x_102 }}" cy="{{ $route->y_102 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_102 }}' y='{{ $route->y_102 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_103)
                        <path class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_103 }} {{ $route->y_103 }}, {{ $route->x_102 }} {{ $route->y_102 }}"></path>
                        <circle id="03" cx="{{ $route->x_103 }}" cy="{{ $route->y_103 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_103 }}' y='{{ $route->y_103 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_104)
                        <path class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_104 }} {{ $route->y_104 }}, {{ $route->x_103 }} {{ $route->y_103 }}"></path>
                        <circle id="03" cx="{{ $route->x_104 }}" cy="{{ $route->y_104 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_104 }}' y='{{ $route->y_104 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_105)
                        <path class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_105 }} {{ $route->y_105 }}, {{ $route->x_104 }} {{ $route->y_104 }}"></path>
                        <circle id="03" cx="{{ $route->x_105 }}" cy="{{ $route->y_105 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_105 }}' y='{{ $route->y_105 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_106)
                        <path class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_106 }} {{ $route->y_106 }}, {{ $route->x_105 }} {{ $route->y_105 }}"></path>
                        <circle id="03" cx="{{ $route->x_106 }}" cy="{{ $route->y_106 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_106 }}' y='{{ $route->y_106 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_107)
                        <path class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_107 }} {{ $route->y_107 }}, {{ $route->x_106 }} {{ $route->y_106 }}"></path>
                        <circle id="03" cx="{{ $route->x_107 }}" cy="{{ $route->y_107 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_107 }}' y='{{ $route->y_107 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_108)
                        <path class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_108 }} {{ $route->y_108 }}, {{ $route->x_107 }} {{ $route->y_107 }}"></path>
                        <circle id="03" cx="{{ $route->x_108 }}" cy="{{ $route->y_108 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_108 }}' y='{{ $route->y_108 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_109)
                        <path class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_109 }} {{ $route->y_109 }}, {{ $route->x_108 }} {{ $route->y_108 }}"></path>
                        <circle id="03" cx="{{ $route->x_109 }}" cy="{{ $route->y_109 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_109 }}' y='{{ $route->y_109 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_110)
                        <path class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_110 }} {{ $route->y_110 }}, {{ $route->x_109 }} {{ $route->y_109 }}"></path>
                        <circle id="03" cx="{{ $route->x_110 }}" cy="{{ $route->y_110 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_110 }}' y='{{ $route->y_110 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_111)
                        <path class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_111 }} {{ $route->y_111 }}, {{ $route->x_110 }} {{ $route->y_110 }}"></path>
                        <circle id="03" cx="{{ $route->x_111 }}" cy="{{ $route->y_111 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_111 }}' y='{{ $route->y_111 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty

                        @empty(!$route->x_112)
                        <path class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_112 }} {{ $route->y_112 }}, {{ $route->x_111 }} {{ $route->y_111 }}"></path>
                        <circle id="03" cx="{{ $route->x_112 }}" cy="{{ $route->y_112 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_112 }}' y='{{ $route->y_112 }}' font-family='Verdana' font-size='20' fill='blue'><tspan dx='-60' dy='50' font-weight='bold'>ВЫ ЗДЕСЬ</tspan></text>
                        @endempty
                    </svg>
                </div>
            </div>
            @endif
        </div>

        <script>
            $('.map-image{{ $route->id }}').flickity({
                cellAlign: 'left',
                contain: true,
                draggable: false,
                imagesLoaded: true,
                pageDots: false
            });
        </script>
        
        @endforeach

    </div></div>
</div></div>

<script>
    $(document).ready(function(){
        $("svg").find("text").hide();
        $("svg").find("text:last").show();
        //$("#wrapper").html($("#wrapper").html());
    });
</script>

<script> // КЛАВИАТУРА
    $(document).ready(function(){
    $('#v1,#v2,#v3,#v4,#v5,#v6,#v7,#v8,#v9,#v10,#v11,#v12,#v13,#v14,#v15,#v16,#v17,#v18,#v19,#v20,#v21,#v22,#v23,#v24,#v25,#v26,#v27,#v28,#v29,#v30,#v31,#v32,#v33,#v34,#v35,#v36,#v37,#v38,#v39,#v40,#v41,#rv01,#rv02,#rv03,#rv04,#rv05,#rv06,#rv07,#rv08,#rv09,#rv10,#rv11,#rv12,#rv13,#rv14,#rv15,#rv16,#rv17,#rv18,#rv19,#rv20,#rv21,#rv22,#rv23,#rv24,#rv25,#rv26,#rv27,#rv28,#rv29,#rv30,#rv31,#rv32,#rv33,#rv34,#rv35,#rv36,#rv37,#rv38,#rv39,#rv40,#rv41').click(function(){
         var v = $(this).val();
        var total = $('#myInput').val($('#myInput').val() + v);

        e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);

     });
   $('#clear').click(function(){
       $('#myInput').val('');
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
     });
   $('#backspace').click(function(){
       $('#myInput').val($('#myInput').val().substring(0, $('#myInput').val().length - 1));
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
     });
 });
</script>

<script> // ПЕРЕКЛЮЧЕНИЕ КЛАВИАТУРЫ
$('.k-eng').hide();
$('.globebutton').on('click',
function()
{
    $('.k-rus, .k-eng').toggle()
}
);
</script>

<script> // ZOOM
    const elem = document.getElementById('wrapper-inner');
            const zoomInButton = document.getElementById('zoomin');
            const zoomOutButton = document.getElementById('zoomout');
            const resetButton = document.getElementById('reset');
            const panzoom = Panzoom(elem, {
                contain: 'outside',
                duration: 200,
                startX: 0,
                startY: 0,
                startScale: 1,
                maxScale: 6,
                minScale: 1,
            });
            const parent = elem.parentElement
    // No function bind needed
    parent.addEventListener('wheel', panzoom.zoomWithWheel);
    zoomInButton.addEventListener('click', panzoom.zoomIn)
    zoomOutButton.addEventListener('click', panzoom.zoomOut)
    resetButton.addEventListener('click', panzoom.reset)
          </script>





          <script> // ВВОД В ИНПУТ АВТО

function myFunction() {
// Declare variables
var input, filter, ul, li, a, i, txtValue;
input = document.getElementById('myInput');
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
li = ul.getElementsByTagName('li');

// Loop through all list items, and hide those who don't match the search query
for (i = 0; i < li.length; i++) {
a = li[i].getElementsByTagName("a")[0];
txtValue = a.textContent || a.innerText;
if (txtValue.toUpperCase().indexOf(filter) > -1) {
  li[i].style.display = "";
} else {
  li[i].style.display = "none";
}
}
}
            
          </script>



<script>    
$('.ads').click(function() {
  $('.ads').hide();
  $('.ads video').get(0).pause();
  $('.ads video').get(0).currentTime = 0;
});
</script>




</body>
</html>
