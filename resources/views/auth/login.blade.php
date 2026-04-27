<x-layout>
    <x-form title="Log In" description="Welcome Back">
        <form action="{{ route('login.store') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <x-form.field name="email" label="Email" type="email" required />

            <x-form.field name="password" label="Password" type="password" required />

            <button type="submit" class="btn btn-primary w-full h-10 mt-2">Log In</button>
        </form>
    </x-form>
</x-layout>
