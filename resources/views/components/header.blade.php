<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $slot }}</title>
    <link rel="stylesheet" href="{{ asset('icons/css/all.min.css') }}">
</head>
<body class="bg-neutral-950 relative">