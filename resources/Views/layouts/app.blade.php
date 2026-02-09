<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Users App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">My Users App</h1>
            <div>
                <a href="/" class="hover:underline mr-4">Users</a>
                <a href="/create" class="hover:underline">Add User</a>
            </div>
        </div>
    </nav>

    <main class="flex-1 p-8">
        @yield('content')
    </main>

    <footer class="bg-gray-200 text-gray-700 p-4 text-center">
        &copy; {{ date('Y') }} My Users App
    </footer>

</body>
</html>
