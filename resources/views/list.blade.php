<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaraVue</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" /> -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <div id="app">
            <example-component></example-component>
        </div>
        <style>
            body {
                background-image: url("/images/pexels-photo-160107.jpeg");
                background-repeat: no-repeat;
                
            }
        </style>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>