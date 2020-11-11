@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Настройки</h1>
            </div>
        </div>

        <form action="/setup/{{$setup->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$setup->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Цветовая схема
                </dt>
                <dd class="col-sm-9">
                    <input type="color" class="form-control" name="color" value="{{$setup->color}}">
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>

@endsection