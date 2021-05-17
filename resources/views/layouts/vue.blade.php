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
        
        foreach ($host1 as $host1line) { $h1 = $host1line; }
        foreach ($host2 as $host2line) { $h2 = $host2line; }
    @endphp

    @php if ($h1 == $h2) { @endphp 
        <div id="app"></div>
    @php } else { @endphp
        <div style="position: absolute; top: 40vh; left: 0; right: 0; text-align: center;"><p style="font-size: 50px;"><strong>Ошибка</strong><br>Повторное использование лицензии.</p></div>
    @php } @endphp
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>