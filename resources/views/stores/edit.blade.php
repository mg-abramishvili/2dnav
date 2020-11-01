@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$stores->title}}</h1>
                <p style="color: #999">Редактирование магазина</p>
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
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Теги
                </dt>
                <dd class="col-sm-9">
                    <select name="tag_id" class="form-control">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ ($tag->id == $stores->tag_id)? 'selected="selected"' : '' }}>{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>

@endsection