<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ? $title . ' | ' : '' }}{{ config('app.name') }}</title>
    <meta name="description" content="Ranah Academy Admin">
    <meta name="author" content="Ranah Academy">
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-slate-100 text-slate-800 antialiased">
    <div class="min-h-screen">
        <div id="sidebarBackdrop" class="fixed inset-0 z-40 hidden bg-slate-900/40 md:hidden" onclick="toggleSidebar(false)"></div>
        <div class="md:flex">
            <x-sidebar />
            <div class="flex min-h-screen flex-col md:flex-1">
                <x-navbar />
                <main class="flex-1 p-4 sm:p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
