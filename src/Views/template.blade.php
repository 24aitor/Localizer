<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=320, initial-scale=1.0, maximum-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

        <!-- CDN of icons -->
        <link rel="stylesheet" href="http://cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css">

        <!-- CDN of flags -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.7.0/css/flag-icon.css" />

        <title>@yield('title')</title>
        <style>
            *, *:before, *:after {
                box-sizing: border-box;
                }

                html, body {
                height: 100%;
                width: 100%;
                }

                body {
                background: #222;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                font-family: 'Noto Sans', sans-serif;
                }

                .but {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                text-decoration: none;
                cursor: pointer;
                border: 1px solid #3F51B5;
                border-radius: 8px;
                height: 2.8em;
                width: 10em;
                padding: 0;
                outline: none;
                overflow: hidden;
                color: #3F51B5;
                -webkit-transition: color 0.3s 0.1s ease-out;
                transition: color 0.3s 0.1s ease-out;
                text-align: center;
                line-height: 250%;
                }
                .but::before {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                content: '';
                border-radius: 50%;
                display: block;
                width: 20em;
                height: 20em;
                line-height: 20em;
                left: -5em;
                text-align: center;
                -webkit-transition: box-shadow 0.5s ease-out;
                transition: box-shadow 0.5s ease-out;
                z-index: -1;
                }
                .but:hover {
                color: #fff;
                text-decoration: none;
                }
                .but:hover::before {
                box-shadow: inset 0 0 0 10em #3F51B5;
                }
        </style>

    </head>
    <body style="background-color:#F5F5F5;">

        @yield('content')
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <div class="footer">
            <center>
            @yield('footer')
        </center>
        </div>
        <br><br>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>


        @yield('js')
    </body>
</html>
