@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-8">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="/edit" method="POST" class="space-y-4">
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div>
            <label class="block text-gray-700 mb-1">Username</label>
            <input type="text" name="username" class="border p-2 w-full rounded" value="{{ $user->username }}">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" name="email" class="border p-2 w-full rounded" value="{{ $user->email }}">
        </div>

        <div>
            <label class="block text-gray-700 mb-1">Age</label>
            <input type="number" name="age" class="border p-2 w-full rounded" value="{{ $user->age }}">
        </div>

        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded">Update User</button>
    </form>
</div>
@endsection
