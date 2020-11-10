@extends('layouts.app')
@section('content')

    <style>
        .wrapper-map {
            width: 800px;
            height: 450px;
            overflow: hidden;
            position: relative;
            margin: 0 auto;
        }

        .map,
        .map2 {
            width: 100%;
            height: 100%;
        }

        .map img {
            width: 100%;
            height: 100%;
            border: 5px solid red;
            display: block;
            margin: 0 auto;
        }
        
        .map-path {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }

        svg path {
            display: none;
        }

        svg svg:not(:first-child) {
            display:none;
        }
    </style>

    <div style="width:100%; overflow-x: scroll;">
        <div class="wrapper-map">
            <div class="map">
                <img id="imageToSwap" src="/img/schemeblank.jpg"/>
            </div>
            <svg class="map-path" viewbox="0 0 800 450"></svg>
        </div>
    </div>

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Добавление значка</h1>
            </div>
        </div>

        <form action="/marks" method="post" enctype="multipart/form-data">@csrf
            
            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Схема
                </dt>
                <dd class="col-sm-9">
                    <select name="scheme_id" class="form-control" onchange="$('#imageToSwap').attr('src', this.options[this.selectedIndex].title);">
                        <option title="/img/schemeblank.jpg" selected="selected">Выберите схему</option>
                        @foreach($schemes as $scheme)
                            <option value="{{ $scheme->id }}" title="{{ $scheme->image }}">{{ $scheme->title }}</option>
                        @endforeach
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Значок
                </dt>
                <dd class="col-sm-9">
                    <select name="markimages[]" class="form-control">
                        @foreach($markimages as $markimage)
                            <option value="{{ $markimage->id }}">{{ $markimage->title }}</option>
                        @endforeach
                    </select>
                </dd>
            </div>

            <div>
                <div class="row align-items-center mb-2">
                    <dt class="col-sm-3">
                        x_01
                    </dt>
                    <dd class="col-sm-9">
                        <input class="form-control" type="text" name="x_01" id="x_01">
                    </dd>
                </div>

                <div class="row align-items-center mb-2">
                    <dt class="col-sm-3">
                        y_01
                    </dt>
                    <dd class="col-sm-9">
                        <input class="form-control" type="text" name="y_01" id="y_01">
                    </dd>
                </div>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>

        </form>
    </div>



@endsection
@section('scripts')
@parent
<script>
    var id = 0;

    $(document).ready(function() {
        $(".wrapper-map").on("click", function(event) {
            id++;

            var tstr = "";
            if(id <10)
            {
                tstr = "0";
            }
            tstr += id;

            var x = event.pageX - this.offsetLeft;
            var y = event.pageY - this.offsetTop;

            var element = $('<svg id="'+x+'" class="'+y+'"><path class="key-anim'+tstr+'" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M'+x+' '+y+', 200 100"/><circle id="'+tstr+'" cx="'+x+'" cy="'+y+'" r="7" fill="#f33" /></svg>');
            $(".map-path").append(element);

            var previousx = $(element).closest('svg').prev().attr('id');
            var previousy = $(element).closest('svg').prev().attr('class');
            
            var newelement = $('<svg id="'+x+'" class="'+y+'"><path class="key-anim'+tstr+'" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M'+x+' '+y+', '+previousx+' '+previousy+'"/><circle id="'+tstr+'" cx="'+x+'" cy="'+y+'" r="7" fill="#f33" /></svg>');
            $(".map-path").append(newelement);

            $(element).remove();

            $("#x_"+tstr+"").val(x).change();
            $("#y_"+tstr+"").val(y).change();
            $("#p_x_"+tstr+"").val(previousx).change();
            $("#p_y_"+tstr+"").val(previousy).change();
            
        });
    });
</script>

@endsection