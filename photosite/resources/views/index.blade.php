<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Photosite</title>

        <script src="{{ mix('js/app.js') }}" async> </script>
    </head>
    <body>
        <div id="app"> 
            <app></app>
        </div>
    </body>
</html>
