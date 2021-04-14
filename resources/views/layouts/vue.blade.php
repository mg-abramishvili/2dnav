<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DreamApp Navigator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-horizontal.css') }}">
</head>
<body>

    <div id="app"></div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        //document.oncontextmenu = new Function("return false;");
    </script>
    <script>
        document.onkeydown = function(e){
            e = e || window.event;
            var key = e.which || e.keyCode;
            // CTRL + Q
            if(key == 81 && e.ctrlKey){
                window.location.href = "/login";
            }
        }        
    </script>
</body>
</html>