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
                <img id="imageToSwap"
                src="
                    @foreach($schemes as $scheme)
                        @foreach($stores->schemes as $t)
                            @if($scheme->id == $t->id)
                                {{$t->image}}
		                    @endif
                        @endforeach
                    @endforeach"/>
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
                <h1>{{$stores->title}}</h1>
                <p style="color: #999">Редактирование помещения</p>
            </div>
        </div>

        <form action="/stores/{{$stores->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$stores->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title" value="{{$stores->title}}">

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
                        @foreach($schemes as $scheme)
                            <option value="{{$scheme->id}}" title="{{ $scheme->image }}" @foreach($stores->schemes as $t) @if($scheme->id == $t->id)selected="selected"@endif @endforeach>{{$scheme->title}}</option>
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
                        <input class="form-control" type="text" name="x_01" id="x_01" value="{{ $stores->x_01 }}">
                    </dd>
                </div>

                <div class="row align-items-center mb-2">
                    <dt class="col-sm-3">
                        y_01
                    </dt>
                    <dd class="col-sm-9">
                        <input class="form-control" type="text" name="y_01" id="y_01" value="{{ $stores->y_01 }}">
                    </dd>
                </div>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Логотип
                </dt>
                <dd class="col-sm-9">
                    <input class="logo" type="file" name="logo" x-ref="logo">

                    @if ($errors->has('logo'))
                        <div class="alert alert-danger">
                            Укажите логотип
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Категория
                </dt>
                <dd class="col-sm-9">
                    <select name="tags[]" class="form-control" multiple>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}" @foreach($stores->tags as $t) @if($tag->id == $t->id)selected="selected"@endif @endforeach>{{$tag->title}}</option>
                        @endforeach
                    </select>                        
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Поисковые слова
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="keywords" value="{{$stores->keywords}}">

                    @if ($errors->has('keywords'))
                        <div class="alert alert-danger">
                            Укажите поисковые слова
                        </div>
                    @endif
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

        var element = $('<svg id="{{ $stores->x_01 }}" class="{{ $stores->y_01 }}"><path class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $stores->x_01 }} {{ $stores->y_01 }}, 200 100"/><circle id="01" cx="{{ $stores->x_01 }}" cy="{{ $stores->y_01 }}" r="7" fill="#f33" /></svg>');
        $(".map-path").html(element);
        
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
<script>
    FilePond.registerPlugin(FilePondPluginImagePreview);
    $('.logo').filepond({
        allowMultiple: false,
        allowReorder: false,
        imagePreviewHeight: 140,
        labelIdle: 'Нажмите для загрузки файлов',
        labelFileProcessing: 'Загрузка',
        labelFileProcessingComplete: 'Загружено',
        labelTapToCancel: '',
        labelTapToUndo: '',

        server: {
            remove: (filename, load) => {
                load('1');
                return  ajax_delete('deletelogo');
            },
            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                const formData = new FormData();
                formData.append(fieldName, file, file.name);
                const request = new XMLHttpRequest();
                request.open('POST', '/stores/file/upload');
                request.upload.onprogress = (e) => {
                    progress(e.lengthComputable, e.loaded, e.total);
                };
                request.onload = function() {
                    if (request.status >= 200 && request.status < 300) {
                        load(request.responseText);
                    }
                    else {
                        error('oh no');
                    }
                };
                request.send(formData);
                return {
                    abort: () => {
                        request.abort();
                        abort();
                    }
                };
            },
            revert: (filename, load) => {
                load(filename)
            },
            load: (source, load, error, progress, abort, headers) => {
                var myRequest = new Request(source);
                fetch(myRequest).then(function(response) {
                    response.blob().then(function(myBlob) {
                        load(myBlob)
                    });
                });
            },
        },
        @if($stores->logo)
        files: [
            {
                source: '{{ $stores->logo }}',
                options: {
                    type: 'local',
                }
            }
        ]
        @endif
    });

    function ajax_delete(methos){
        $.ajax({
           url:'/stores/file/'+methos,
            method:'POST'
        });
    }
</script>
@endsection