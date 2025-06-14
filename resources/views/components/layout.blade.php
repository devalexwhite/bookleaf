<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, Adwaita Sans, Cantarell, Ubuntu, roboto, noto, helvetica, arial, sans-serif;
                /* background: #1e1c34;
                * color: white;
                */
                background-color: #004604;
                color: white;
                max-width: 600px;
                margin: 1rem auto;
                padding: 1rem;
            }

            h1 {
                font-size: 1.375rem;
                font-weight: bold;
            }

            h2 {
                font-size: 1.15rem;
                font-weight: 500;
                line-height: 150%;
            }

            ul {
                margin: 0;
                padding: 0 0 0 0.625rem;
                line-height: 170%;
            }

            p {
                font-size: 1rem;
            }

            a {
                color: white;
            }

            header {
                margin: 3rem 0;
            }

            #actions {
                display: flex;
                flex-direction: row;
                gap: 1rem;
            }

            form {
                max-width: 400px;
            }

            form input {
                width: 100%;
                font-size: 1.25rem;
            }

            form button {
                margin-top: 2rem;
            }

            #errors {
                margin: 2rem 0;
            }

            #errors li {
                color: red;
            }


        </style>
        @if(isset($styles))
            {{ $styles }}
        @endif
        <title>{{ '🍂 BookLeaf: ' . $title ?? 'Simple Bookmarks' }}</title>
    </head>
    <body class="">
        {{ $slot }}
    </body>
</html>
