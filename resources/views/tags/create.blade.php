@extends('layouts.app')
@section('content')

    <style>
        .radio {
            background: #ccc;
            margin-bottom: 20px;
        }

        input[type="radio"] {
            border: 2px solid red;
        }

        input[type="radio"]:checked+label {
            border: 4px solid #3171B8;
        } 

        .radio label {
            width: 100%;
            height: 100px;
            position: relative;
        }

        .radio img {
            width: auto;
            height: auto;
            max-width: 70%;
            max-height: 70%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Добавление категории</h1>
            </div>
        </div>

        <form action="/tags" method="post" enctype="multipart/form-data">@csrf
            
            <div class="row align-items-center mb-5">
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title">
                    @if ($errors->has('title'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('title') }}-->
                            Укажите название
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row mb-2">
                <dt class="col-sm-3">
                    Иконка
                </dt>
                <dd class="col-sm-9">
                    <div class="row">
                    @foreach($markimages as $markimage)
                        <div class="col-2">
                        <div class="radio">
                        <input name="markimages" id="{{ $markimage->id }}" type="radio" value="{{ $markimage->id }}">
                        <label for="{{ $markimage->id }}">
                            <img src="{{ $markimage->image }}" style="width:100%">
                        </label>
                        </div>
                        </div>
                    @endforeach
                    </div>

                    @if ($errors->has('markimages'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('markimages') }}-->
                            Укажите иконку
                        </div>
                    @endif
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>

        </form>
    </div>

@endsection