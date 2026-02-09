@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-8 bg-gray-100">

    <h1 class="text-3xl font-bold mb-6">Users List</h1>

    

    <table class="min-w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Username</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Age</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t">
                <td class="p-3">{{ $user->id }}</td>
                <td class="p-3">{{ $user->username }}</td>
                <td class="p-3">{{ $user->email }}</td>
                <td class="p-3">{{ $user->age }}</td>
                <td class="p-3 space-x-2">
                     <form action="/edit" method="GET" class="inline">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                            Edit
                        </button>
                    </form>
                  <form action="/delete" method="POST" class="inline">
                     
                      <input type="hidden" name="id" value="{{ $user->id }}">
                      <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                          onclick="return confirm('Are you sure you want to delete this user?')">
                          Delete
                      </button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
