<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Photosite</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        <link href="css/utilities.css" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet"> 

        <script src="{{ mix('js/app.js') }}" async> </script>

    </head>
    <body>
        <div id="app"> 
            <app></app>
        </div>
    </body>
</html>
