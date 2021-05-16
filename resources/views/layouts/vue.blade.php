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

    @php
        $host1file = './host1.txt';
        $host2file = './host2.txt';
        $host1 = file($host1file);
        $host2 = file($host2file);
        
        foreach ($host1 as $host1line) {
            echo '<div id="a_host1" style="display: none;">'.$host1line.'</div>';
        }

        foreach ($host2 as $host2line) {
            echo '<div id="a_host2" style="display: none;">'.$host2line.'</div>';
        }
    @endphp

    <div id="app"></div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>