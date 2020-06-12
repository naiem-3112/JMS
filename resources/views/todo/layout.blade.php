<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Create Todo</title>
    @livewireStyles
</head>
<body>
<div class="text-center pt-10 flex justify-center">
    <div class="w-1/3 py-4 border border-gray-400 rounded">
        @yield('content')
    </div>
</div>
@livewireScripts
</body>
</html>
