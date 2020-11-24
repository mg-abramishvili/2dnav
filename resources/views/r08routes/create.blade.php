@extends('layouts.app')
@section('content')

<style>
        .key-anim01,
        .key-anim02,
        .key-anim03,
        .key-anim04,
        .key-anim05,
        .key-anim06,
        .key-anim07,
        .key-anim08,
        .key-anim09,
        .key-anim10,
        .key-anim11,
        .key-anim12,
        .key-anim13,
        .key-anim14,
        .key-anim15 {
            stroke-dasharray: 10;
            stroke-dashoffset: -2000;
            animation: Drawpath 20s linear infinite;
        }

        @keyframes Drawpath {
            from {
                stroke-dashoffset: -2000;
            }
            to {
                stroke-dashoffset: 0;
            }
        }
        
        .wrapper-map,
        .wrapper-map2 {
            width: 800px;
            height: 450px;
            overflow: hidden;
            position: relative;
            margin: 0 auto;
        }

        .map,
        .map2 {
            width: 100%;
            height: 100%;
        }

        .map img,
        .map2 img {
            width: 100%;
            height: 100%;
            border: 5px solid red;
            display: block;
            margin: 0 auto;
        }
        
        .map-path,
        .map-path2 {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <p style="color: red; text-align: center;">До 10 точек в каждом блоке!</p>

    <div style="width:100%; overflow-x: scroll;">
        <div class="wrapper-map">
            <div class="map">
                <img id="imageToSwap" src="/img/schemeblank.jpg"/>
            </div>
            <svg class="map-path" viewbox="0 0 800 450"></svg>
        </div>
    </div>

    <div style="width:100%; overflow-x: scroll;">
        <div class="wrapper-map2">
            <div class="map2">
                <img id="imageToSwap2" src="/img/schemeblank.jpg"/>
            </div>
            <svg class="map-path2" viewbox="0 0 800 450"></svg>
        </div>
    </div>

    @if ($errors->has('x_01'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('x_01') }}-->
                            Нарисуйте маршрут
                        </div>
                    @endif

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Добавление маршрута</h1>
            </div>
        </div>

        <form action="/r08routes" method="post" enctype="multipart/form-data">@csrf
            
            <div class="row align-items-center mb-2" style="display:none;">
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="title" id="title" value="T8 -> ">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Магазин
                </dt>
                <dd class="col-sm-9">
                    <select name="stores" class="form-control" onchange="$('#title').attr('value', this.options[this.selectedIndex].title);">
                        <option disabled selected value>Выберите магазин</option>
                        @foreach($stores as $store)
                            @if(!count($store->r08routes))
                                <option value="{{ $store->id }}" title="T8 -> {{ $store->title }}">{{ $store->title }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('stores'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('stores') }}-->
                            Укажите магазин
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Схема
                </dt>
                <dd class="col-sm-9">
                    <select name="scheme_id" class="form-control" onchange="$('#imageToSwap').attr('src', this.options[this.selectedIndex].title);">
                        <option title="/img/schemeblank.jpg" disabled selected value>Выберите схему</option>
                        @foreach($schemes as $scheme)
                            <option value="{{ $scheme->id }}" title="{{ $scheme->image }}">{{ $scheme->title }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('scheme_id'))
                        <div class="alert alert-danger">
                            <!--{{ $errors->first('scheme_id') }}-->
                            Укажите схему
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Схема 2
                </dt>
                <dd class="col-sm-9">
                    <select name="scheme2_id" class="form-control" onchange="$('#imageToSwap2').attr('src', this.options[this.selectedIndex].title);">
                        <option title="/img/schemeblank.jpg" selected="selected">Выберите схему</option>
                        @foreach($schemes as $scheme)
                            <option value="{{ $scheme->id }}" title="{{ $scheme->image }}">{{ $scheme->title }}</option>
                        @endforeach
                    </select>
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    Текстовые обозначения
                </dt>
                <dd class="col-sm-9">
                    <div class="row">
                        <div class="col-6">
                            <label for="t_1_begin">Текст к начальной точке Схемы 1</label>
                            <input type="text" class="form-control mb-2" name="t_1_begin" id="title" value="Вы здесь">
                        </div>
                        <div class="col-6">
                            <label for="t_1_end">Текст к конечной точке Схемы 1</label>
                            <input type="text" class="form-control mb-2" name="t_1_end" id="title" value="Вы пришли">
                        </div>
                        <div class="col-6">
                            <label for="t_2_begin">Текст к начальной точке Схемы 2</label>
                            <input type="text" class="form-control" name="t_2_begin" id="title" value="Вы здесь">
                        </div>
                        <div class="col-6">
                            <label for="t_2_end">Текст к конечной точке Схемы 2</label>
                            <input type="text" class="form-control" name="t_2_end" id="title" value="Вы пришли">
                        </div>
                    </div>
                </dd>
            </div>

            <div style="display:none;">
            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_01
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_01" id="x_01">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_01
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_01" id="y_01">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_01
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_01" id="p_x_01">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_01
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_01" id="p_y_01">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_02
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_02" id="x_02">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_02
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_02" id="y_02">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_02
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_02" id="p_x_02">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_02
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_02" id="p_y_02">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_03
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_03" id="x_03">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_03
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_03" id="y_03">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_03
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_03" id="p_x_03">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_03
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_03" id="p_y_03">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_04
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_04" id="x_04">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_04
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_04" id="y_04">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_04
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_04" id="p_x_04">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_04
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_04" id="p_y_04">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_05
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_05" id="x_05">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_05
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_05" id="y_05">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_05
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_05" id="p_x_05">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_05
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_05" id="p_y_05">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_06
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_06" id="x_06">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_06
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_06" id="y_06">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_06
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_06" id="p_x_06">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_06
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_06" id="p_y_06">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_07
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_07" id="x_07">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_07
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_07" id="y_07">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_07
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_07" id="p_x_07">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_07
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_07" id="p_y_07">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_08
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_08" id="x_08">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_08
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_08" id="y_08">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_08
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_08" id="p_x_08">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_08
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_08" id="p_y_08">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_09
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_09" id="x_09">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_09
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_09" id="y_09">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_09
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_09" id="p_x_09">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_09
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_09" id="p_y_09">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_10
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_10" id="x_10">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_10
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_10" id="y_10">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_10
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_10" id="p_x_10">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_10
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_10" id="p_y_10">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_11
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_11" id="x_11">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_11
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_11" id="y_11">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_11
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_11" id="p_x_11">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_11
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_11" id="p_y_11">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_12
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_12" id="x_12">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_12
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_12" id="y_12">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_12
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_12" id="p_x_12">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_12
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_12" id="p_y_12">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_101
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_101" id="x_101">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_101
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_101" id="y_101">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_101
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_101" id="p_x_101">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_101
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_101" id="p_y_101">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_102
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_102" id="x_102">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_102
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_102" id="y_102">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_102
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_102" id="p_x_102">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_102
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_102" id="p_y_102">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_103
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_103" id="x_103">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_103
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_103" id="y_103">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_103
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_103" id="p_x_103">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_103
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_103" id="p_y_103">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_104
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_104" id="x_104">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_104
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_104" id="y_104">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_104
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_104" id="p_x_104">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_104
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_104" id="p_y_104">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_105
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_105" id="x_105">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_105
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_105" id="y_105">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_105
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_105" id="p_x_105">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_105
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_105" id="p_y_105">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_106
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_106" id="x_106">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_106
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_106" id="y_106">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_106
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_106" id="p_x_106">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_106
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_106" id="p_y_106">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_107
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_107" id="x_107">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_107
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_107" id="y_107">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_107
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_107" id="p_x_107">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_107
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_107" id="p_y_107">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_108
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_108" id="x_108">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_108
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_108" id="y_108">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_108
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_108" id="p_x_108">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_108
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_108" id="p_y_108">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_109
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_109" id="x_109">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_109
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_109" id="y_109">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_109
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_109" id="p_x_109">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_109
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_109" id="p_y_109">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_110
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_110" id="x_110">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_110
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_110" id="y_110">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_110
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_110" id="p_x_110">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_110
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_110" id="p_y_110">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_111
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_111" id="x_111">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_111
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_111" id="y_111">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_111
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_111" id="p_x_111">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_111
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_111" id="p_y_111">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    x_112
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="x_112" id="x_112">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    y_112
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="y_112" id="y_112">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_x_112
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_x_112" id="p_x_112">
                </dd>
            </div>

            <div class="row align-items-center mb-2">
                <dt class="col-sm-3">
                    p_y_112
                </dt>
                <dd class="col-sm-9">
                    <input class="form-control" type="text" name="p_y_112" id="p_y_112">
                </dd>
            </div>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>

        </form>
    </div>



@endsection
@section('scripts')
@parent
<script>
    var id = 0;

    $(document).ready(function() {
        $(".wrapper-map").on("click", function(event) {
            id++;

            var tstr = "";
            if(id <10)
            {
                tstr = "0";
            }
            tstr += id;

            var x = event.pageX - this.offsetLeft;
            var y = event.pageY - this.offsetTop;

            var element = $('<svg id="'+x+'" class="'+y+'"><path class="key-anim'+tstr+'" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M'+x+' '+y+', 200 100"/><circle id="'+tstr+'" cx="'+x+'" cy="'+y+'" r="7" fill="#f33" /></svg>');
            $(".map-path").append(element);

            var previousx = $(element).closest('svg').prev().attr('id');
            var previousy = $(element).closest('svg').prev().attr('class');
            
            var newelement = $('<svg id="'+x+'" class="'+y+'"><path class="key-anim'+tstr+'" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M'+x+' '+y+', '+previousx+' '+previousy+'"/><circle id="'+tstr+'" cx="'+x+'" cy="'+y+'" r="7" fill="#f33" /></svg>');
            $(".map-path").append(newelement);

            $(element).remove();

            $("#x_"+tstr+"").val(x).change();
            $("#y_"+tstr+"").val(y).change();
            $("#p_x_"+tstr+"").val(previousx).change();
            $("#p_y_"+tstr+"").val(previousy).change();
            
        });
    });
</script>


<script>
    var id2 = 0;

    $(document).ready(function() {
        $(".wrapper-map2").on("click", function(event) {
            id2++;

            var tstr2 = "";
            if(id2 <10)
            {
                tstr2 = "0";
            }
            tstr2 += id2;

            var x2 = event.pageX - this.offsetLeft;
            var y2 = event.pageY - this.offsetTop;

            var element2 = $('<svg id="'+x2+'" class="'+y2+'"><path class="key-anim'+tstr2+'" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M'+x2+' '+y2+', 200 100"/><circle id="'+tstr2+'" cx="'+x2+'" cy="'+y2+'" r="7" fill="#f33" /></svg>');
            $(".map-path2").append(element2);

            var previousx2 = $(element2).closest('svg').prev().attr('id');
            var previousy2 = $(element2).closest('svg').prev().attr('class');
            
            var newelement2 = $('<svg id="'+x2+'" class="'+y2+'"><path class="key-anim'+tstr2+'" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M'+x2+' '+y2+', '+previousx2+' '+previousy2+'"/><circle id="'+tstr2+'" cx="'+x2+'" cy="'+y2+'" r="7" fill="#f33" /></svg>');
            $(".map-path2").append(newelement2);

            $(element2).remove();

            $("#x_1"+tstr2+"").val(x2).change();
            $("#y_1"+tstr2+"").val(y2).change();
            $("#p_x_1"+tstr2+"").val(previousx2).change();
            $("#p_y_1"+tstr2+"").val(previousy2).change();
            
        });
    });
</script>


@endsection