<div id="overlay" class="w-full h-full fixed z-20 flex justify-center items-center" style="background: rgba(0, 0, 0, 0.5);">
    <div class="w-2/4 h-2/4 bg-white rounded shadow overflow-hidden relative">
        <img class="w-full bg-cover absolute z-0" src="" alt="" id="popup-login-image">
        <div class="w-full h-full flex relative py-3 px-3">
            <div class="w-2/4 h-full">
                <p class="text-2xl text-white font-bold">eLearning</p>
            </div>
            <div class="w-2/4 h-full bg-white rounded">
                <div class="w-full py-3 px-5 flex justify-between">
                    <i></i>
                    <i class="fa-solid fa-xmark cursor-pointer" id="popup-login-close-btn"></i>
                </div>
                <form action="{{ route('login') }}" method="POST" class="w-full h-full py-3 px-5">
                    @csrf
                    <p class="font-bold capitalize py-3">login</p>

                    <span class="py-3 capitalize">email</span>
                    <input class="font-nunito w-full py-1 px-1 border border-gray-300 focus:outline-none rounded" type="email" id="email" name="email" placeholder="masukkan email anda..." required>

                    <span class="py-3 capitalize">password</span>
                    <input class="font-nunito w-full py-1 px-1 border border-gray-300 focus:outline-none rounded" type="password" id="password" name="password" placeholder="masukkan password anda..." required>

                    <button class="w-full py-3 px-5 bg-black text-white rounded my-3 capitalize" type="submit">masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>