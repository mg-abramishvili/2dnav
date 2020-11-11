@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Маршруты от Т2</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/routes02/create" class="btn btn-primary">Добавить маршрут</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($routes02 as $route)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$route->title}}
                    </td>
                    <td style="width: 200px;">
                        <a href="/routes02/{{$route->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/routes02/delete/{{$route->id}}" class="btn btn-sm btn-danger">Удалить</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td style="text-align: center;">
                        Пусто &#9785;
                    </td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection