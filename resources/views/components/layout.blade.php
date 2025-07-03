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

    <footer class="footer sm:footer-horizontal bg-neutral text-neutral-content items-center p-4">
        <aside class="grid-flow-col items-center">
            <img src=" /images/logo-dark.svg" class="size-8" />
            <p>An <a class="underline" href="https://thatalexguy.dev" target="_blank">Alex White</a> Product</p>
        </aside>
        <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
            <a href="https://github.com/devalexwhite/bookleaf" target="_blank">
                <img src="/images/github.svg" class="size-6" />
            </a>
        </nav>
    </footer>
</body>

</html>