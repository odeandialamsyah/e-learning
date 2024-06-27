@extends('admin.layouts.admin')

@section('content')
<div class=" h-24 bg-white"></div>
<div class="container w-3/4 ml-96 items-center">
    <h1 class="text-3xl font-bold mb-4">All Users</h1>
    <table class="w-4/5 bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-left text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6">Name</th>
                <th class="py-3 px-6">Email</th>
                <th class="py-3 px-6 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $user->name }}</td>
                    <td class="py-3 px-6">{{ $user->email }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
