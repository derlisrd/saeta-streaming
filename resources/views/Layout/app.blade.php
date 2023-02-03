<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ URL('assets/images/favicon.ico') }}">
    <title>
        @yield('title','Admin')
    </title>
    <link href="{{ URL('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/icons/all.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;600&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="{{ URL('assets/css/style.dashboard.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/css/sweetalert2.min.css') }}" rel="stylesheet">
    @livewireStyles
    @yield('styles')

    <style>

        .page    { display: none; padding: 0 0.5em; }
        .page h1 { font-size: 2em; line-height: 1em; margin-top: 1.1em; font-weight: bold; }
        .page p  { font-size: 1.5em; line-height: 1.275em; margin-top: 0.15em; }

        #loading {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
        width: 100vw;
        height: 100vh;
        background-color: #f1f1f1;
        background-image: url("{{ URL('assets/img/loading.svg') }}");
        background-repeat: no-repeat;
        background-position: center;
        }
    </style>

</head>
<body>
    <div id="loading"></div>
    <div class='dashboard page'>
        @include('Layout.menu')

        <div class='dashboard-app'>
            <header class='dashboard-toolbar'>
                <span class="menu-toggle cursor-pointer"><i class="fas fa-bars"></i></span>
                <div class="d-flex flex-row-reverse w-100">
                    <small class="text-muted"> {{ Auth::user()->name }} <i class="fa fa-user"></i></small>
                </div>
            </header>


            <div class='dashboard-content'>
                <div class="container-fluid">
                 @yield('container')
                </div>
            </div>
        </div>
    </div>


    <script src='{{ URL('assets/js/jquery.min.js') }}'></script>
    <script src='{{ URL('assets/js/bootstrap.bundle.min.js') }}'></script>
    <script src="{{ URL('assets/js/script.js') }}"></script>
    <script src="{{ URL('assets/js/sweetalert2.min.js') }}"></script>
    @livewireScripts
    @yield('scripts')


    <script>
        function onReady(callback) {
        var intervalId = window.setInterval(function() {
            if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalId);
            callback.call(this);
            }
        }, 300);
        }

        function setVisible(selector, visible) {
        document.querySelector(selector).style.display = visible ? 'block' : 'none';
        }

        onReady(function() {
        setVisible('.page', true);
        setVisible('#loading', false);
        });
    </script>



</body>
</html>
