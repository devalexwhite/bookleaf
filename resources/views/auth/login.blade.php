<x-layout title="Welcome Back!">
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
    <form method="POST" action="{{ route('users.login') }}">
        @csrf
        <label>
            <p>Email address</p>
            <input type="email" name="email" placeholder="you@email.com">
        </label>
        <label>
            <p>Password</p>
            <input type="password" name="password" placeholder="*******">
        </label>
        <button type="submit" class="button" style="margin-top: 1rem;">Login</button>
    </form>
</x-layout>
