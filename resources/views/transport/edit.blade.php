@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Как уехать</h1>
            </div>
        </div>

        <form action="/transports/{{$transport->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$transport->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Текст
                </dt>
                <dd class="col-sm-9">
                    <textarea rows="7" type="text" class="form-control" id="text" name="text">{{$transport->text}}</textarea>
                    @if ($errors->has('text'))
                        <div class="alert alert-danger">
                            Заполните текст
                        </div>
                    @endif
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        $('textarea[id="text"]').summernote({
            height: 100,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['height', ['height']],
                ['view', ['fullscreen', 'codeview']],
            ],
        });
    </script>
@endsection