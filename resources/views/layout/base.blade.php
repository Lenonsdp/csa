<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/index.js' )}}"></script>
        <title>Tabex</title>
    </head>
    <body>
        <div id="wrapper" class="active">
            <div id="sidebar-wrapper">
                <ul id="sidebar_menu" class="sidebar-nav">
                    <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
                </ul>

                <ul class="sidebar-nav" id="sidebar">
                    <li><a>Home</a></li>
                    <li><a>link2</a></li>
                    <li><a>Home</a></li>
                    <li><a>link2</a></li>
                    <li><a>Home</a></li>
                    <li><a>link2</a></li>
                    <li><a>Home</a></li>
                    <li><a>link2</a></li>
                </ul>

                <ul class="sidebar-nav" id="ulToggleDisabled" style="display:none;">
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                </ul>
            </div>

            <div id="page-content-wrapper">
                <div class="page-content inset">
                <div class="row">
                    <div class="col-md-12" id="header">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo tabex" width="100" height="60">
                    </div>
                    </div>
                    <div class="row" id="breadCrumb"></div>
                    <div class="row" id="containerProduct">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
