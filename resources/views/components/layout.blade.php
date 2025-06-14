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
                margin: 0rem auto;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            header {
                padding: 0.5rem;

            }

            main {
                flex-grow: 1;
                padding: 0.5rem;
            }

            footer {
                font-size: 0.75rem;
                padding: 1rem 0.5rem;
                text-align: center;
            }

            h1 {
                font-size: 1.375rem;
                font-weight: bold;
            }

            a {
                text-decoration: none;
            }

            a:hover {
                text-decoration: underline;
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
        <title>{{ '🍂 BookLeaf: ' . (isset($title) ? $title : 'Simple Bookmarks') }}</title>
    </head>
    <body class="">
        <header>
            <h1><a href="/">🍂 BookLeaf</a></h1>
            @if(isset($title))
                <h2>{{ $title }}</h2>
            @endif
            <div id="actions">
                @guest
                    <a href="{{ route('signup') }}">Sign Up</a>
                    <a href="{{ route('login') }}">Login</a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('bookmarks.index') }}">Bookmarks</a>
                    <a href="{{ route('logout') }}">Logout</a>
                @endauth
            </div>
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer>
            Made by Alex White in Ohio on Linux.
        </footer>
    </body>
</html>
