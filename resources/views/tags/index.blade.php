@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Категории</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/tags/create" class="btn btn-primary">Добавить категорию</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($tags as $tag)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$tag->title}}

                        @if(sizeof($tag->store) > 0)
                        <ul>
                            @foreach($tag->store as $store)
                            <li>{{$store->title}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </td>
                    <td style="width: 200px;">
                        <a href="/tags/{{$tag->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/tags/delete/{{$tag->id}}" class="btn btn-sm btn-danger">Удалить</a>
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