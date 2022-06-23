<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ufashion API</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: #86b3fc;
            }
            a {
                text-decoration: none;
                border: 3px solid yellow;
                color: transparent;
                padding: 40px 80px;
                font-size: 28px;
                font-family: sans-serif;
                letter-spacing: 5px;
                transition: all 0.5s;
                position: relative;
            }
            a:before {
                content: "Go To API";
                display: flex;
                justify-content: center;
                align-items: center;
                color: yellow;
                background: #a463ff;
                font-size: 28px;
                top: 0;
                left: 100%;
                font-family: sans-serif;
                letter-spacing: 5px;
                transition: all 1s;
                height: 100%;
                width: 100%;
                position: absolute;
                transform: scale(0) rotatey(0);
                opacity: 0;
            }
            a:hover:before {
                transform: scale(1) rotatey(360deg);
                left: 0;
                opacity: 1;
            }
            a:after {
                content: "Products";
                display: flex;
                justify-content: center;
                align-items: center;
                color: yellow;
                background: #a463ff;
                font-size: 28px;
                top: 0;
                left: 0;
                font-family: sans-serif;
                letter-spacing: 5px;
                transition: all 1s;
                height: 100%;
                width: 100%;
                position: absolute;
                transform: scale(1) rotatey(0);
                opacity: 1;
            }
            a:hover:after {
                transform: scale(0) rotatey(360deg);
                left: -100%;
                opacity: 0;
            }
        </style>
    </head>
    <body>
        <a href="/products">Button</a>
    </body>
</html>
