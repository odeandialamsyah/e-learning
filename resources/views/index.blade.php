<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Index</title>
</head>
<body class=" bg-neutral-950">

    {{-- Navigation --}}
    <nav class="min-w-full py-3 px-4 flex shadow justify-between items-center">
        <div class="flex items-center">
            <p class="text-2xl mr-16 font-raleway font-bold text-white">eLearning</p>
            <ul class="flex gap-3">
                <li><a href="" class="inline text-white">courses</a></li>
                <li><a href="" class="inline text-white">news</a></li>
            </ul>
        </div>
        <div>
            <a href="" class="text-white">sign in</a>
        </div>
    </nav>

    {{-- Container --}}
    <div class="min-w-full py-3 px-4 flex gap-5">
        <div class="w-96 h-auto bg-white rounded shadow py-3 px-5">
            <p class="">waktunya belajar</p>
            <p class="text-6xl font-bold font-raleway">Belajar Mudah, Masa Depan Cerah</p>
        </div>

        <div class="w-96 h-auto bg-white rounded shadow">
            <img src="{{url('images/element5-digital-jCIMcOpFHig-unsplash.jpg')}}" alt="College Student Handle a Book"  class="w-full h-full rounded">
        </div>
    </div>
</body>
</html>