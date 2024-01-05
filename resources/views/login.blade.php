<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div style="width: 600px;" class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-center pt-10">Login</h2>

    @if(Session::has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ Session::get('error') }}
        </div>
    @endif

    @if(Session::has('canAccess'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ Session::get('canAccess') }}
        </div>
    @endif

    <form class="space-y-4" action="{{ route('loginPost') }}" method="post">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
            <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
            <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="pb-12">
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Login</button>
        </div>
    </form>
</div>

</body>
</html>
