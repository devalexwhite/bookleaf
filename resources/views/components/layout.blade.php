<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🍂</text></svg>" />
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.6/dist/htmx.min.js"></script>
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

    <footer class="bg-gray-900">
        <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center gap-x-6 md:order-2">
                <a href="https://github.com/devalexwhite/bookleaf" target="_blank"
                    class="text-gray-400 hover:text-white">
                    <span class="sr-only">Github</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M6.28 5.22a.75.75 0 0 1 0 1.06L2.56 10l3.72 3.72a.75.75 0 0 1-1.06 1.06L.97 10.53a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Zm7.44 0a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L17.44 10l-3.72-3.72a.75.75 0 0 1 0-1.06ZM11.377 2.011a.75.75 0 0 1 .612.867l-2.5 14.5a.75.75 0 0 1-1.478-.255l2.5-14.5a.75.75 0 0 1 .866-.612Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-center text-sm/6 text-gray-400 md:order-1 md:mt-0">An <a href="https://thatalexguy.dev"
                    target="_blank" class="underline text-blue-300">Alex White</a> project.</p>
        </div>
    </footer>
</body>

</html>