@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$tags->title}}</h1>
                <p style="color: #999">Редактирование тега</p>
            </div>
        </div>

        <form action="/tags/{{$tags->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$tags->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title" value="{{$tags->title}}">
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>

@endsection