@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>
                    Маршруты
                    @isset($routes_t)
                        <span>от терминала №{{ $routes_t }}</span>
                    @endisset
                </h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/routes_t_create/{{ $routes_t }}" class="btn btn-primary">Добавить маршрут</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($routes as $route)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        <small>T{{$routes_t}} →</small>
                        <br>
                        <span>
                            @foreach($route->stores as $rs)
                                {{$rs->title}}
                            @endforeach
                        </span>
                    </td>
                    <td style="width: 200px;">
                        <a href="/routes/delete/{{$route->id}}" class="btn btn-sm btn-danger">Удалить</a>
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