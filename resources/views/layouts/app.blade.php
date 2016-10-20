<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Realhosting - Migrationtool</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .navbar {
            min-height: 70px;
        }

        .navbar-brand>img {
                margin: -12px;
                width: 85%;
        }
        .panel-default>.panel-heading {
                background-color: rgba(100,17,122,.7);
                color: white;
                
        }
    </style>
</head>
<body id="app-layout">

    <nav class="navbar navbar-default">
           <!--  <div class="col-sm-3" style="padding: 10px 30px;">
                <img src="https://realhosting.nl/wp-content/themes/realhosting/assets/img/logo.png">    
            </div> -->
            
        <div class="container">
            <div class="navbar-header"> 
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="https://realhosting.nl/wp-content/themes/realhosting/assets/img/logo.png">

                </a>


            </div>

        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
