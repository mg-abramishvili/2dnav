@extends('layouts.front')
@section('content')

<div class="catlist-list catlist-list2" style="padding: 0 20px; margin-bottom: 20px;">
        @foreach($tagsall as $tagallitem)
            <div class="catlist-item">
                <a href="/front-tags4/{{ $tagallitem->id }}">
                    <img src="/img/catlist01.png">
                    <p>{{ $tagallitem->title }}</p>
                </a>
            </div>
        @endforeach
    </div>

<div>
    <div class="wrapper" id="wrapper">
        <div id="wrapper-inner">
        
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
                        <text x='{{ $route->x_01 }}' y='{{ $route->y_01 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_begin }}</tspan></text>
                        @endempty

                        @empty(!$route->x_02)
                        <path class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_02 }} {{ $route->y_02 }}, {{ $route->x_01 }} {{ $route->y_01 }}"></path>
                        <circle id="02" cx="{{ $route->x_02 }}" cy="{{ $route->y_02 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_02 }}' y='{{ $route->y_02 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_03)
                        <path class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_03 }} {{ $route->y_03 }}, {{ $route->x_02 }} {{ $route->y_02 }}"></path>
                        <circle id="03" cx="{{ $route->x_03 }}" cy="{{ $route->y_03 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_03 }}' y='{{ $route->y_03 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_04)
                        <path class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_04 }} {{ $route->y_04 }}, {{ $route->x_03 }} {{ $route->y_03 }}"></path>
                        <circle id="03" cx="{{ $route->x_04 }}" cy="{{ $route->y_04 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_04 }}' y='{{ $route->y_04 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_05)
                        <path class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_05 }} {{ $route->y_05 }}, {{ $route->x_04 }} {{ $route->y_04 }}"></path>
                        <circle id="03" cx="{{ $route->x_05 }}" cy="{{ $route->y_05 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_05 }}' y='{{ $route->y_05 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_06)
                        <path class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_06 }} {{ $route->y_06 }}, {{ $route->x_05 }} {{ $route->y_05 }}"></path>
                        <circle id="03" cx="{{ $route->x_06 }}" cy="{{ $route->y_06 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_06 }}' y='{{ $route->y_06 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_07)
                        <path class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_07 }} {{ $route->y_07 }}, {{ $route->x_06 }} {{ $route->y_06 }}"></path>
                        <circle id="03" cx="{{ $route->x_07 }}" cy="{{ $route->y_07 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_07 }}' y='{{ $route->y_07 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_08)
                        <path class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_08 }} {{ $route->y_08 }}, {{ $route->x_07 }} {{ $route->y_07 }}"></path>
                        <circle id="03" cx="{{ $route->x_08 }}" cy="{{ $route->y_08 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_08 }}' y='{{ $route->y_08 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_09)
                        <path class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_09 }} {{ $route->y_09 }}, {{ $route->x_08 }} {{ $route->y_08 }}"></path>
                        <circle id="03" cx="{{ $route->x_09 }}" cy="{{ $route->y_09 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_09 }}' y='{{ $route->y_09 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_10)
                        <path class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_10 }} {{ $route->y_10 }}, {{ $route->x_09 }} {{ $route->y_09 }}"></path>
                        <circle id="03" cx="{{ $route->x_10 }}" cy="{{ $route->y_10 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_10 }}' y='{{ $route->y_10 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_11)
                        <path class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_11 }} {{ $route->y_11 }}, {{ $route->x_10 }} {{ $route->y_10 }}"></path>
                        <circle id="03" cx="{{ $route->x_11 }}" cy="{{ $route->y_11 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_11 }}' y='{{ $route->y_11 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_12)
                        <path class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_12 }} {{ $route->y_12 }}, {{ $route->x_11 }} {{ $route->y_11 }}"></path>
                        <circle id="03" cx="{{ $route->x_12 }}" cy="{{ $route->y_12 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_12 }}' y='{{ $route->y_12 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_1_end }}</tspan></text>
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
                        <text x='{{ $route->x_101 }}' y='{{ $route->y_101 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_begin }}</tspan></text>
                        @endempty

                        @empty(!$route->x_102)
                        <path class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_102 }} {{ $route->y_102 }}, {{ $route->x_101 }} {{ $route->y_101 }}"></path>
                        <circle id="02" cx="{{ $route->x_102 }}" cy="{{ $route->y_102 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_102 }}' y='{{ $route->y_102 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_103)
                        <path class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_103 }} {{ $route->y_103 }}, {{ $route->x_102 }} {{ $route->y_102 }}"></path>
                        <circle id="03" cx="{{ $route->x_103 }}" cy="{{ $route->y_103 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_103 }}' y='{{ $route->y_103 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_104)
                        <path class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_104 }} {{ $route->y_104 }}, {{ $route->x_103 }} {{ $route->y_103 }}"></path>
                        <circle id="03" cx="{{ $route->x_104 }}" cy="{{ $route->y_104 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_104 }}' y='{{ $route->y_104 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_105)
                        <path class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_105 }} {{ $route->y_105 }}, {{ $route->x_104 }} {{ $route->y_104 }}"></path>
                        <circle id="03" cx="{{ $route->x_105 }}" cy="{{ $route->y_105 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_105 }}' y='{{ $route->y_105 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_106)
                        <path class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_106 }} {{ $route->y_106 }}, {{ $route->x_105 }} {{ $route->y_105 }}"></path>
                        <circle id="03" cx="{{ $route->x_106 }}" cy="{{ $route->y_106 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_106 }}' y='{{ $route->y_106 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_107)
                        <path class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_107 }} {{ $route->y_107 }}, {{ $route->x_106 }} {{ $route->y_106 }}"></path>
                        <circle id="03" cx="{{ $route->x_107 }}" cy="{{ $route->y_107 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_107 }}' y='{{ $route->y_107 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_108)
                        <path class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_108 }} {{ $route->y_108 }}, {{ $route->x_107 }} {{ $route->y_107 }}"></path>
                        <circle id="03" cx="{{ $route->x_108 }}" cy="{{ $route->y_108 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_108 }}' y='{{ $route->y_108 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_109)
                        <path class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_109 }} {{ $route->y_109 }}, {{ $route->x_108 }} {{ $route->y_108 }}"></path>
                        <circle id="03" cx="{{ $route->x_109 }}" cy="{{ $route->y_109 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_109 }}' y='{{ $route->y_109 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_110)
                        <path class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_110 }} {{ $route->y_110 }}, {{ $route->x_109 }} {{ $route->y_109 }}"></path>
                        <circle id="03" cx="{{ $route->x_110 }}" cy="{{ $route->y_110 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_110 }}' y='{{ $route->y_110 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_111)
                        <path class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_111 }} {{ $route->y_111 }}, {{ $route->x_110 }} {{ $route->y_110 }}"></path>
                        <circle id="03" cx="{{ $route->x_111 }}" cy="{{ $route->y_111 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_111 }}' y='{{ $route->y_111 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
                        @endempty

                        @empty(!$route->x_112)
                        <path class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_112 }} {{ $route->y_112 }}, {{ $route->x_111 }} {{ $route->y_111 }}"></path>
                        <circle id="03" cx="{{ $route->x_112 }}" cy="{{ $route->y_112 }}" r="7" fill="#f33"></circle>
                        <text x='{{ $route->x_112 }}' y='{{ $route->y_112 }}' font-family='Verdana' font-size='12' fill='blue'><tspan dx='-20' dy='30' font-weight='bold'>{{ $route->t_2_end }}</tspan></text>
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
                pageDots: false,
                //prevNextButtons: false,
            });
        </script>

    </div>
</div>

<div class="store-about">
    @foreach($route->stores as $store)
        <h1>{{ $store->title }}</h1>
        @foreach($store->tags as $tag)
            <p>{{ $tag->title }}</p>
        @endforeach
    @endforeach
</div>

<div class="footer">
    <a href="/4"><img src="/img/home.png"/></a>
    <a href="javascript:history.back()"><img src="/img/back.png"/></a>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#map").css('opacity', '0');
            setTimeout(function () {
                panzoom.reset({ startScale: 2 })
            }, 250);
            setTimeout(function () {
                panzoom.reset({ startScale: 1 })
            }, 350);
            setTimeout(function () {
                $("#map").css('opacity', '1');
            }, 750)
        });
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