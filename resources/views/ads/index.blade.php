@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Реклама</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/ads/create" class="btn btn-primary">Добавить рекламу</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($ads as $ad)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$ad->title}}
                    </td>
                    <td style="width: 200px;">
                        <a href="/ads/{{$ad->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/ads/delete/{{$ad->id}}" class="btn btn-sm btn-danger">Удалить</a>
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