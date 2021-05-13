@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Скидки</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/specials/create" class="btn btn-primary">Добавить скидку</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($specials as $special)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$special->title}}
                    </td>
                    <td style="width: 200px;">
                        <a href="/specials/{{$special->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/specials/delete/{{$special->id}}" class="btn btn-sm btn-danger">Удалить</a>
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