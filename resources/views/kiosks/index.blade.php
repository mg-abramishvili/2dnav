@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Киоски</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <!--<a href="/kiosks/create" class="btn btn-primary">Добавить киоск</a>-->
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($kiosks as $kiosk)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px;">
                        {{$kiosk->kiosk}}
                    </td>
                    <td style="width: 200px;">
                        <a href="/kiosks/{{$kiosk->id}}/edit" class="btn btn-sm btn-warning">Правка</a>
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