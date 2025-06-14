<x-layout>
    <header>
        <h1>Welcome to 🍂 BookLeaf</h1>
        <div id="actions">
            <a href="/">Home</a>
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </header>
    <main>
    @if ($errors->any())
        <div id="errors">
            <h5>Validation Errors</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <label>
            <p>Email address</p>
            <input type="email" name="email" placeholder="you@email.com"></label>
        </label>
        <label>
            <p>Password</p>
            <input type="password" name="password" placeholder="*******"></label>
        </label>
        <label>
            <p>Confirm Password </p>
            <input type="password" name="confirm_password" placeholder="*******"></label>
        </label>
        <button type="submit">Create account</button>
    </form>

    </main>
</x-layout>
