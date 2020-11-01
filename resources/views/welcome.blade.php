<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DreamApp Navigator</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="/js/dragscroll.js"></script>
        <script src="https://timmywil.com/panzoom/demo/panzoom.js"></script>

        <link rel="stylesheet" href="/css/style.css">

    </head>
    <body>

<div class="container">

<!--<button id="zoomin">+</button>
<button id="zoomout">-</button>-->

<div class="list">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Поиск ...">
    <div id="myKeyboard" class="modal">
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
                        <button class="globebutton" style="width: 50px;">RU/EN</button>
                        <button value="" id="backspace">&#x2190</button>
                        <button value="" id="clear">&times;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($routes as $route)
        {{ $route->title }}
    @endforeach
    <ul id="myUL">
        <li>
            <a id="map01-link">
                <strong>Adidas</strong>
                <span>спортивные товары</span>
                <span>одежда</span>
            </a>
        </li>
        <li>
            <a id="map02-link">
                <strong>Bershka</strong>
                <span>одежда</span>
                <span>обувь</span>
            </a>
        </li>
        <li>
            <a id="map03-link">
                <strong>Аптека «Планета Здоровья»</strong>
                <span>аптека</span>
                <span>лекарства</span>
            </a>
        </li>
        <li>
            <a id="map04-link">
                <strong>Синема Парк</strong>
                <span>кинотеатр</span>
            </a>
        </li>
        <li>
            <a id="map05-link">
                <strong>Ситилинк</strong>
                <span>бытовая техника</span>
                <span>компьютеры</span>
                <span>смартфоны</span>
            </a>
        </li>
        <li>
            <a id="map06-link">
                <strong>Yota</strong>
                <span>сотовая связь</span>
                <span>интернет</span>
            </a>
        </li>
      </ul>
</div>


<div class="dragscroll">
    <div class="wrapper" id="wrapper">
        
        <div class="map" id="map">
            <img src="{{ $schememain->image }}"/>
        </div>

        @foreach($routes as $route)
        <svg class="map-path" viewBox="0 0 800 450">
            @empty(!$route->x_01)
            <path class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_01 }} {{ $route->y_01 }}, undefined undefined"></path>
            <circle id="01" cx="{{ $route->x_01 }}" cy="{{ $route->y_01 }}" r="7" fill="#f33"></circle>
            <text x="{{ $route->x_01 }}" y="{{ $route->y_01 }}" font-family="Verdana" font-size="20" fill="blue">
                <tspan dx="-60" dy="50" font-weight="bold">ВЫ ЗДЕСЬ</tspan>
            </text>
            @endempty

            @empty(!$route->x_02)
            <path class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_02 }} {{ $route->y_02 }}, {{ $route->x_01 }} {{ $route->y_01 }}"></path>
            <circle id="02" cx="{{ $route->x_02 }}" cy="{{ $route->y_02 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_03)
            <path class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_03 }} {{ $route->y_03 }}, {{ $route->x_02 }} {{ $route->y_02 }}"></path>
            <circle id="03" cx="{{ $route->x_03 }}" cy="{{ $route->y_03 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_04)
            <path class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_04 }} {{ $route->y_04 }}, {{ $route->x_03 }} {{ $route->y_03 }}"></path>
            <circle id="03" cx="{{ $route->x_04 }}" cy="{{ $route->y_04 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_05)
            <path class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_05 }} {{ $route->y_05 }}, {{ $route->x_04 }} {{ $route->y_04 }}"></path>
            <circle id="03" cx="{{ $route->x_05 }}" cy="{{ $route->y_05 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_06)
            <path class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_06 }} {{ $route->y_06 }}, {{ $route->x_05 }} {{ $route->y_05 }}"></path>
            <circle id="03" cx="{{ $route->x_06 }}" cy="{{ $route->y_06 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_07)
            <path class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_07 }} {{ $route->y_07 }}, {{ $route->x_06 }} {{ $route->y_06 }}"></path>
            <circle id="03" cx="{{ $route->x_07 }}" cy="{{ $route->y_07 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_08)
            <path class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_08 }} {{ $route->y_08 }}, {{ $route->x_07 }} {{ $route->y_07 }}"></path>
            <circle id="03" cx="{{ $route->x_08 }}" cy="{{ $route->y_08 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_09)
            <path class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_09 }} {{ $route->y_09 }}, {{ $route->x_08 }} {{ $route->y_08 }}"></path>
            <circle id="03" cx="{{ $route->x_09 }}" cy="{{ $route->y_09 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_10)
            <path class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_10 }} {{ $route->y_10 }}, {{ $route->x_09 }} {{ $route->y_09 }}"></path>
            <circle id="03" cx="{{ $route->x_10 }}" cy="{{ $route->y_10 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_11)
            <path class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_11 }} {{ $route->y_11 }}, {{ $route->x_10 }} {{ $route->y_10 }}"></path>
            <circle id="03" cx="{{ $route->x_11 }}" cy="{{ $route->y_11 }}" r="7" fill="#f33"></circle>
            @endempty

            @empty(!$route->x_12)
            <path class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(200,10,10,0.5)" d="M{{ $route->x_12 }} {{ $route->y_12 }}, {{ $route->x_11 }} {{ $route->y_11 }}"></path>
            <circle id="03" cx="{{ $route->x_12 }}" cy="{{ $route->y_12 }}" r="7" fill="#f33"></circle>
            @endempty
        </svg>
        @endforeach

    </div>
</div></div>





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

<script> // ZOOM
    const elem = document.getElementById('wrapper');
            const zoomInButton = document.getElementById('zoomin');
            const zoomOutButton = document.getElementById('zoomout');
            const resetButton = document.getElementById('reset');
            const panzoom = Panzoom(elem, {
                duration: 700,
                startX: 0,
                startY: 0,
                startScale: 0.5,
                maxScale: 2,
                minScale: 0.075,
            });
            const parent = elem.parentElement
    // No function bind needed
    parent.addEventListener('wheel', panzoom.zoomWithWheel);
    zoomInButton.addEventListener('click', panzoom.zoomIn)
    zoomOutButton.addEventListener('click', panzoom.zoomOut)
    resetButton.addEventListener('click', panzoom.reset)
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



          




</body>
</html>
