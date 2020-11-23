@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Файлы иконок</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/markimages/create" class="btn btn-primary">Загрузить файл иконки</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($markimages as $markimage)
                <tr>
                    <td style="width:80px; background: grey;"><img src="{{$markimage->image}}" style="width:100%;"/></td>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$markimage->title}}
                    </td>
                    <td style="width: 200px;">
                        <a href="/markimages/delete/{{$markimage->id}}" class="btn btn-sm btn-danger">Удалить</a>
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