@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Значки</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/marks/create" class="btn btn-primary">Добавить значок</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($marks as $mark)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$mark->title}}
                    </td>
                    <td style="width: 200px;">
                        <a href="/marks/{{$mark->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/marks/delete/{{$mark->id}}" class="btn btn-sm btn-danger">Удалить</a>
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