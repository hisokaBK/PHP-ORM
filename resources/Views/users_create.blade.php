@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-8">
    <h1 class="text-2xl font-bold mb-4">Add New User</h1>

    <form action="create" method="POST" class="space-y-4">
        <div>
            <label class="block text-gray-700 mb-1">Username</label>
            <input type="text" name="username" class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" name="email" class="border p-2 w-full rounded">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Age</label>
            <input type="number" name="age" class="border p-2 w-full rounded">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add User</button>
    </form>
</div>
@endsection
