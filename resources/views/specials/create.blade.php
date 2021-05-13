@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Добавление скидки</h1>
            </div>
        </div>

        <form action="/specials" method="post" enctype="multipart/form-data">@csrf
            
            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title">
                    @if ($errors->has('title'))
                        <div class="alert alert-danger">
                            Укажите название
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Файл
                </dt>
                <dd class="col-sm-9">
                    <input class="specialfile" type="file" name="specialfile" x-ref="specialfile">
                    @if ($errors->has('specialfile'))
                        <div class="alert alert-danger">
                            Укажите файл
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Помещение
                </dt>
                <dd class="col-sm-9">
                    <select name="stores" class="form-control">
                        <option value="no_store">Без привязки</option>
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->title }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('stores'))
                        <div class="alert alert-danger">
                            Укажите помещение
                        </div>
                    @endif
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>

        </form>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        $('.specialfile').filepond({
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
                    return  ajax_delete('deletespecialfile');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/specials/file/upload');
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
        });

        function ajax_delete(methos){
            $.ajax({
                url:'/specials/file/'+methos,
                method:'POST'
            });
        }
    </script>

@endsection