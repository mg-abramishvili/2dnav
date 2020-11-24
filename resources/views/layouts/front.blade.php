<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DreamApp Navigator</title>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/flickity.pkgd.min.js"></script>
    <script src="/js/panzoom.js"></script>

    <link rel="stylesheet" href="/css/flickity.css">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>

    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="/">
                    <img src="/img/logo.svg" style="width:100%;">
                </a>
            </div>
            <div class="datetime">
                <span>
                    <strong>14:25</strong>
                    22.11.2020
                </span>
            </div>
            <script>
                $(function() {
                    startRefresh();
                });

                function startRefresh() {
                    setTimeout(startRefresh,1000);
                    $.get('/time.php', function(data) {
                        $('.datetime').html(data);    
                    });
                }
            </script>
        </div>
        @yield('content')
    </div>

    <script>
        $(document).ready(function(){
            $("svg").find("text").hide();
            $("svg").find("text:first").show();
            $("svg").find("text:last").show();
            //$("#wrapper").html($("#wrapper").html());
        });
    </script>

    <script> // ZOOM
        const elem = document.getElementById('wrapper-inner');
            const zoomInButton = document.getElementById('zoomin');
            const zoomOutButton = document.getElementById('zoomout');
            const resetButton = document.getElementById('reset');
            const panzoom = Panzoom(elem, {
                contain: 'outside',
                duration: 200,
                startX: 0,
                startY: 0,
                startScale: 1,
                maxScale: 6,
                minScale: 1,
            });
            const parent = elem.parentElement
        parent.addEventListener('wheel', panzoom.zoomWithWheel);
        zoomInButton.addEventListener('click', panzoom.zoomIn)
        zoomOutButton.addEventListener('click', panzoom.zoomOut)
        resetButton.addEventListener('click', panzoom.reset)
    </script>

    @yield('scripts')

</body>
</html>