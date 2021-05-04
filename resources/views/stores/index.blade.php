@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Магазины</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/stores/create" class="btn btn-primary">Добавить магазин</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($stores as $store)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$store->title}}
                        <!--
                        <br>
                        @foreach($store->tags as $tag)
                            <span>{{ $tag->title }}</span>
                        @endforeach
                        -->
                    </td>
                    <td style="width: 200px;">
                        <a href="/stores/{{$store->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
                        <a href="/stores/delete/{{$store->id}}" class="btn btn-sm btn-danger">Удалить</a>
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