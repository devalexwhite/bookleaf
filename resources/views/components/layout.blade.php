<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🍂</text></svg>" />
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.6/dist/htmx.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gnat/surreal@main/surreal.js"></script>
    @vite('resources/css/app.css')
    @if(isset($styles))
        {{ $styles }}
    @endif
    <title>{{ 'BookLeaf: ' . (isset($title) ? $title : 'Simple Bookmarks') }}</title>
</head>

<body class="">
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-footer />
</body>

</html>