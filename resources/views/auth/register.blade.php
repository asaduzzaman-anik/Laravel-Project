<x-layout>
    <x-form title="Register an Account" description="Start tracking your ideas today">
        <form action="{{ route('register.store') }}" method="POST" class="mt-6 space-y-4">
            @csrf
            <x-form.field name="name" label="Name" type="text" required />

            <x-form.field name="email" label="Email" type="email" required />

            <x-form.field name="password" label="Password" type="password" required />

            <x-form.field name="password_confirmation" label="Confirm Password" type="password" required />

            <button type="submit" class="btn btn-primary w-full h-10 mt-2">Create Account</button>
        </form>
    </x-form>
</x-layout>
