@extends('layouts.front')
@section('content')

    <!--<div class="catlist-list catlist-list2" style="padding: 0 20px; margin-top: 25px;">
        @foreach($tagsall as $tagallitem)
            <div class="catlist-item">
                <a href="/front-tags/{{ $tagallitem->id }}">
                    <img src="/img/catlist01.png">
                    <p>{{ $tagallitem->title }}</p>
                </a>
            </div>
        @endforeach
    </div>-->

    
    <div id="myKeyboard" class="modal" style="margin-top: 60px; margin-bottom: 60px; padding: 40px;">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск ..." style="font-size: 40px; text-transform: uppercase; padding: 35px; width: auto; margin: 0 30px; width: calc(100% - 135px); margin-bottom: 30px;">
        <div class="modal-content">
            <!--<span class="close">&times;</span>-->
            <div class="veteran-list-keyboard">
                <div class="keyboard">
                    <div style="text-align: center;">
                        <div class="k-eng">
                        <!--<button value="1" id="v28">1</button>
                        <button value="2" id="v29">2</button>
                        <button value="3" id="v30">3</button>
                        <button value="4" id="v31">4</button>
                        <button value="5" id="v32">5</button>
                        <button value="6" id="v33">6</button>
                        <button value="7" id="v34">7</button>
                        <button value="8" id="v35">8</button>
                        <button value="9" id="v36">9</button>
                        <button value="0" id="v37">0</button>
                        <button value="@" id="v41">@</button>
                        <br>-->
                        <button value="Q" id="v18">Q</button>
                        <button value="W" id="v24">W</button>
                        <button value="E" id="v5">E</button>
                        <button value="R" id="v19">R</button>
                        <button value="T" id="v21">T</button>
                        <button value="Y" id="v26">Y</button>
                        <button value="U" id="v22">U</button>
                        <button value="I" id="v9">I</button>
                        <button value="O" id="v16">O</button>
                        <button value="P" id="v17">P</button>
                        <br>
                        <button value="A" id="v1">A</button>
                        <button value="S" id="v20">S</button>
                        <button value="D" id="v4">D</button>
                        <button value="F" id="v6">F</button>
                        <button value="G" id="v7">G</button>
                        <button value="H" id="v8">H</button>
                        <button value="J" id="v10">J</button>
                        <button value="K" id="v11">K</button>
                        <button value="L" id="v13">L</button>
                        <br>
                        <button value="Z" id="v27">Z</button>
                        <button value="X" id="v25">X</button>
                        <button value="C" id="v3">C</button>
                        <button value="V" id="v23">V</button>
                        <button value="B" id="v2">B</button>
                        <button value="N" id="v15">N</button>
                        <button value="M" id="v14">M</button>
                        <!--<button value="." id="v38">.</button>
                        <button value="-" id="v39">-</button>
                        <button value="_" id="v40">_</button>-->
                        <br>
                    </div>
                    <div class="k-rus">
                        <button value="Й" id="rv01">Й</button>
                        <button value="Ц" id="rv02">Ц</button>
                        <button value="У" id="rv03">У</button>
                        <button value="К" id="rv04">К</button>
                        <button value="Е" id="rv05">Е</button>
                        <button value="Н" id="rv06">Н</button>
                        <button value="Г" id="rv07">Г</button>
                        <button value="Ш" id="rv08">Ш</button>
                        <button value="Щ" id="rv09">Щ</button>
                        <button value="З" id="rv10">З</button>
                        <button value="Х" id="rv11">Х</button>
                        <button value="Ъ" id="rv12">Ъ</button>
                        <br>
                        <button value="Ф" id="rv13">Ф</button>
                        <button value="Ы" id="rv14">Ы</button>
                        <button value="В" id="rv15">В</button>
                        <button value="А" id="rv16">А</button>
                        <button value="П" id="rv17">П</button>
                        <button value="Р" id="rv18">Р</button>
                        <button value="О" id="rv19">О</button>
                        <button value="Л" id="rv20">Л</button>
                        <button value="Д" id="rv21">Д</button>
                        <button value="Ж" id="rv22">Ж</button>
                        <button value="Э" id="rv23">Э</button>
                        <br>
                        <button value="Я" id="rv24">Я</button>
                        <button value="Ч" id="rv25">Ч</button>
                        <button value="С" id="rv26">С</button>
                        <button value="М" id="rv27">М</button>
                        <button value="И" id="rv28">И</button>
                        <button value="Т" id="rv29">Т</button>
                        <button value="Ь" id="rv30">Ь</button>
                        <button value="Б" id="rv31">Б</button>
                        <button value="Ю" id="rv32">Ю</button>
                        <!--<button value="." id="v38">.</button>
                        <button value="-" id="v39">-</button>
                        <button value="_" id="v40">_</button>-->
                        <br>
                    </div>
                        <button class="globebutton" style="width: 220px;">RU/EN</button>
                        <button value="" id="backspace">&#x2190</button>
                        <button value="" id="clear">&times;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="tag-page-list" id="myUL">
        @foreach($stores as $store)
            @if(count($store->r09routes))
                <li>
                    <a href="@if(count($store->r09routes))/front-r09routes/@foreach($store->r09routes as $route){{$route->id}}@endforeach @endif">
                        <strong style="display:block; margin-bottom: 10px;">{{$store->title}}</strong>

                        @foreach($store->tags as $tag)
                            <span style="display:inline-block;margin-right: 7px; border-radius: 10px; font-size: 20px; background-color: #ee3984; color: #fff; padding: 10px 20px;">{{$tag->title}}</span>
                        @endforeach
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

    <div class="footer">
        <a href="/9"><img src="/img/home.png"/></a>
    </div>

    @endsection

    @section('scripts')
        <script>
            $('.catlist-list').flickity({
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            });
        </script>

<script> // КЛАВИАТУРА
    $(document).ready(function(){
    $('#v1,#v2,#v3,#v4,#v5,#v6,#v7,#v8,#v9,#v10,#v11,#v12,#v13,#v14,#v15,#v16,#v17,#v18,#v19,#v20,#v21,#v22,#v23,#v24,#v25,#v26,#v27,#v28,#v29,#v30,#v31,#v32,#v33,#v34,#v35,#v36,#v37,#v38,#v39,#v40,#v41,#rv01,#rv02,#rv03,#rv04,#rv05,#rv06,#rv07,#rv08,#rv09,#rv10,#rv11,#rv12,#rv13,#rv14,#rv15,#rv16,#rv17,#rv18,#rv19,#rv20,#rv21,#rv22,#rv23,#rv24,#rv25,#rv26,#rv27,#rv28,#rv29,#rv30,#rv31,#rv32,#rv33,#rv34,#rv35,#rv36,#rv37,#rv38,#rv39,#rv40,#rv41').click(function(){
         var v = $(this).val();
        var total = $('#myInput').val($('#myInput').val() + v);

        e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);

     });
   $('#clear').click(function(){
       $('#myInput').val('');
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
     });
   $('#backspace').click(function(){
       $('#myInput').val($('#myInput').val().substring(0, $('#myInput').val().length - 1));
       e = $.Event('keyup');
e.keyCode= 13; // enter
$('#myInput').trigger(e);
     });
 });
</script>

<script> // ПЕРЕКЛЮЧЕНИЕ КЛАВИАТУРЫ
$('.k-eng').hide();
$('.globebutton').on('click',
function()
{
    $('.k-rus, .k-eng').toggle()
}
);
</script>

<script> // ВВОД В ИНПУТ АВТО

function myFunction() {
// Declare variables
var input, filter, ul, li, a, i, txtValue;
input = document.getElementById('myInput');
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
li = ul.getElementsByTagName('li');

// Loop through all list items, and hide those who don't match the search query
for (i = 0; i < li.length; i++) {
a = li[i].getElementsByTagName("a")[0];
txtValue = a.textContent || a.innerText;
if (txtValue.toUpperCase().indexOf(filter) > -1) {
  li[i].style.display = "";
} else {
  li[i].style.display = "none";
}
}
}
            
          </script>
    @endsection