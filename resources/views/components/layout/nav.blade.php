<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="{{ route('home') }}">
                <img src="/images/logo.png" alt="Logo" width="120">
            </a>
        </div>
        <div class="flex gap-5 items-center">
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn">Logout</button>
                </form>
            @else
                <a href="{{ route('login.create') }}">Login</a>
                <a href="{{ route('register.create') }}" class="btn">Register</a>
            @endauth
        </div>
    </div>
</nav>
