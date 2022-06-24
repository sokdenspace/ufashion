<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ufashion API</title>
        <link rel="shortcut icon" href="{{ asset ('/images/LOGO.png') }}">
        <link rel="icon" type="image/png" href="{{ asset ('/images/LOGO.png') }}">
        <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <a href="/products">Button</a>
    </body>
</html>