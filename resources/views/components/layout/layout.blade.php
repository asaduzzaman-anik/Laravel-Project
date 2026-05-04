<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-foreground">

    <x-layout.nav />
    <main class="max-w-7xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>
    @session('success')
        <div x-data="{ open: true }" x-init="setTimeout(() => open = false, 3000)" x-show="open" x-transition.opacity.duration.500ms
            class="absolute bottom-4 right-4 p-2 mb-2 rounded-lg bg-primary">
            {{ $value }}
        </div>
    @endsession
</body>

</html>
