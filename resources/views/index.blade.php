<x-layout>
    <x-login></x-login>

    {{-- Navigation --}}
    <nav class="navigation min-w-full py-7 px-5 shadow flex justify-between items-center">
        <div class="items-center flex">
            <p class="font-raleway text-2xl font-bold mr-16 text-white">eLearning</p>
        </div>
        <div>
            <a href="" class=" px-5 text-white">login</a>
            <a href="{{ route('daftar') }}" class=" px-5 text-white">sign up</a>
        </div>
    </nav>

    {{-- Container --}}
    <div class="container min-w-full h-screen flex gap-4 py-3 px-5 relative overflow-x-hidden overflow-y-hidden">
        {{-- Content --}}
        <div class="w-2/4 min-h-full py-5 px-5 bg-yellow-300 shadow rounded">
            <p>belajar sekarang</p>
            <h1 class="text-8xl font-bold w-96">Belajar Mudah, Masa Depan Cerah</h1>
        </div>
        {{-- Content --}}
        <div class="w-2/4 min-h-full bg-white shadow rounded overflow-hidden relative">
            <img src="{{ asset('images/pexels-gabby-k-6281924.jpg') }}" alt="Online Learning Illustration" class="w-full h-full rounded object-cover absolute z-0">
            <div class="absolute z-10 py-5 px-5">
                <p class="text-2xl font-bold w-96 text-white">belajar dimana saja</p>
            </div>
        </div>
    </div>
    <x-footer></x-footer>

    <script src="{{ asset('js/script.js') }}"></script>
</x-layout>