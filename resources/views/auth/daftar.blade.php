<x-app>
    <div class="w-full h-screen flex overflow-hidden">
        <div class="w-2/6 h-full overflow-hidden relative"> 
            <video src="{{ asset('videos/7169782-uhd_2160_4096_25fps.mp4') }}" class="w-full bg-cover absolute z-0" autoplay muted loop></video>
            <div class="w-full h-full py-3 px-5 absolute z-10">
                <p class="text-4xl font-bold text-white">eLearning</p>
    
                <div class="py-60">
                    <p class="text-white text-justify" id="quote">Bergabunglah dengan komunitas belajar kami dan jadilah yang terbaik.</p>
                </div>
            </div>
        </div>
        <div class="w-2/3 h-full bg-white">
            <div class="w-full h-full">
                <div class="w-full pt-3 px-5">
                    <a href="{{ url('/') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
                </div>
                <div class="w-full h-full px-60 pt-32">
                    <form action="{{ route('register') }}" method="POST" class="w-full -h-full">
                        @csrf
                        <p class="text-2xl font-bold">daftar</p>
                        <span class="w-full">nama</span>
                        <div class="flex items-center w-full py-1 px-1 shadow rounded mb-3">
                            <i class="fa-regular fa-circle-user px-3"></i>
                            <input id="name" name="name" type="text" placeholder="masukkan nama anda..." class="font-nunito w-full py-1 px-1 focus:outline-none rounded" required>
                        </div>
                        <span class="w-full">email</span>
                        <div class="flex items-center w-full py-1 px-1 shadow rounded mb-3">
                            <i class="fa-regular fa-envelope px-3"></i>
                            <input id="email" name="email" type="email" placeholder="masukkan email anda..." class="font-nunito w-full py-1 px-1 focus:outline-none rounded">
                        </div>
                        <span class="w-full">password</span>
                        <div class="flex items-center w-full py-1 px-1 shadow rounded mb-3">
                            <i class="fa-solid fa-key px-3"></i>
                            <input id="password" name="password" type="password" placeholder="buat password anda..." class="font-nunito w-full py-1 px-1 focus:outline-none rounded">
                        </div>
                        <span class="w-full">konfirmasi password</span>
                        <div class="flex items-center w-full py-1 px-1 shadow rounded mb-3">
                            <i></i>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="konfirmasi ulang password anda..." class="font-nunito w-full py-1 px-1 focus:outline-none rounded">
                        </div>
                        <button type="submit" class="w-full py-3 px-5 rounded bg-black text-white">selesai</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</x-app>