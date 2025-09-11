<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasklee | Task Management Made Easy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p0/1V7l1X8..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">
    <x-header />
    <main class="container mx-auto p-4 mt-4">
        @if(session()->has('success'))
        <div class="p-4 mb-4 text-sm text-white rounded bg-green-500">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        <div>
            @yield('content')
        </div>
    </main>
</body>

</html>