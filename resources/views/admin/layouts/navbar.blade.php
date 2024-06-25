<nav class="navbar md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 transition-all fixed top-0 w-full">
    <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
        <button type="button" class="text-lg text-gray-600 sidebar-toggle">
            <i class="ri-menu-line"></i>
        </button>
        <ul class="flex items-center text-sm ml-4">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
        </ul>
        <ul class="ml-auto flex items-center">
            <li class="dropdown ml-3">
                <button type="button" class="dropdown-toggle flex items-center">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                </button>
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden absolute py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px] right-[20px]">
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"><i class="fa-solid fa-user mr-2"></i> Profile</a>
                    </li>
                    <li>
                        <a class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg me-2" aria-hidden="true"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    
                </ul>
            </li>
        </ul>
    </div>
</nav>