@extends('admin.layouts.admin')

@section('content')
    {{-- <div class="container mx-auto py-8">
        <h2 class="text-3xl font-semibold mb-4">Admin Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card untuk setiap kursus -->
            @foreach ($courses as $course)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/800x400" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($course->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('courses.show', $course->id) }}" class="text-indigo-500 hover:text-indigo-600">View Course</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}
<section id="dashboard" class=" bg-slate-100 h-screen">
    <div class="bg-gray-800 lg:ml-[250px] p-14 lg:flex justify-between">
        <div class="text-center mb-3">
            <h1 class="text-white p-2 text-xl">Dashboard</h1>
            <p class="text-gray-100 p-2 text-sm">Welcome Admin</p>
        </div>
    </div>
    <div class="lg:ml-[250px] lg:grid lg:grid-cols-4 gap-5 mt-[-40px] p-5">
        <div class="p-5 flex bg-white rounded-2xl mb-5 lg:mb-[-7px]">
            <i class="bi bi-wallet text-white border p-4 rounded-xl flex items-center bg-blue-800 border-blue-800"></i>
            <div class="ml-3 mr-16">
                <h1>Users</h1>
                <h2>2</h2>
            </div>
        </div>
        <div class="p-5 flex bg-white rounded-2xl mb-5 lg:mb-[-7px]">
            <i class="bi bi-person-lines-fill text-white border p-4 rounded-xl flex items-center bg-purple-500 border-purpbg-purple-500"></i>
            <div class="ml-3 mr-16">
                <h1>Course</h1>
                <h2>2</h2>
            </div>
        </div>
        <div class="p-5 flex bg-white rounded-2xl mb-5 lg:mb-[-7px]">
            <i class="bi bi-wallet text-white border p-4 rounded-xl flex items-center bg-red-800 border-dark-800"></i>
            <div class="ml-3 mr-7">
                <h1>Moduls</h1>
                <h2>5</h2>
            </div>
        </div>
        <div class="p-5 flex bg-white rounded-2xl mb-5 lg:mb-[-7px]">
            <i class="bi bi-phone text-white border p-4 rounded-xl flex items-center bg-blue-500 border-blue-500"></i>
            <div class="ml-3 mr-4">
                <h1>Quis</h1>
                <h2>19 Orang</h2>
            </div>
        </div>
    </div>
</section>
@endsection
