<x-layout>
    <header>
        <h1>Ad-free, algorithm free, privacy-focused bookmarking.</h1>
        <h2>Save sites for later, remember what you love.<br />No JS, ads, AI, BS or tracking.</h2>
        <div id="actions">
            @guest
                <a href="{{ route('signup') }}">Sign Up</a>
                <a href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('logout') }}">Logout</a>
            @endauth
            <!-- <a href="/discover">Discover </a> -->
        </div>
    </header>
    <main>
    <p>🍂 BookLeaf is a place for to store what you discover on the internet. Here's what the site is (and isn't):</p>
    <ul>
        <li>Organize and search by tags & custom meta.</li>
        <!-- <li>Share & discover collections of bookmarks (but only if you want to)</li> -->
        <li>Distraction free.</li>
        <li>Works great on any device or connection.</li>
        <li>Own your data, export anytime.</li>
        <li><a href="https://herman.bearblog.dev/manifesto/">Built to last forever</a></li>
    </ul>
    </main>
 </x-layout>
