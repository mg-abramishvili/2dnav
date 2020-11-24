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
    
                        @if ($errors->has('x_01'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('x_01') }}-->
                                Укажите точку
                            </div>
                        @endif

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Добавление магазина</h1>
            </div>
        </div>

        <form action="/stores" method="post" enctype="multipart/form-data">@csrf
            
            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title">

                    @if ($errors->has('title'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('title') }}-->
                            Укажите название
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Схема
                </dt>
                <dd class="col-sm-9">
                    <select name="schemes" class="form-control" onchange="$('#imageToSwap').attr('src', this.options[this.selectedIndex].title);">
                        <option title="/img/schemeblank.jpg" disabled selected value>Выберите схему</option>
                        @foreach($schemes as $scheme)
                            <option value="{{ $scheme->id }}" title="{{ $scheme->image }}">{{ $scheme->title }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('schemes'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('schemes') }}-->
                            Укажите схему
                        </div>
                    @endif
                </dd>
            </div>

            <div style="display:none;">
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

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Теги
                </dt>
                <dd class="col-sm-9">
                    <select name="tags[]" class="form-control" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </dd>
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

            var element = $('<svg id="'+x+'" class="'+y+'"><path class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M'+x+' '+y+', 200 100"/><circle id="01" cx="'+x+'" cy="'+y+'" r="7" fill="#f33" /></svg>');
            $(".map-path").html(element);

            $("#x_01").val(x).change();
            $("#y_01").val(y).change();
            
        });
    });
</script>

@endsection