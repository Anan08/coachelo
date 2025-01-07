<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coachelo</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <x-head.tinymce-config/>
</head>
<body class="bg-white dark:bg-slate-800">
    <div class="dark:bg-slate-800">
        <x-navbar1></x-navbar1>
        <main>
            {{ $slot }}
        </main>
    </div>
    
    {{-- message  --}}
    {{-- <div class="fixed bottom-1 right-6 shadow-xl">
        <button class="text-red w-64 bg-orange-400 rounded-md p-3 text-white">
            <div class=" flex items-center justify-between"><img src="https://www.svgrepo.com/show/31480/notification-bell.svg" alt="" class="size-4"><strong>Message</strong></div></h1>
        </button>
    </div> --}}

</body>
</html>