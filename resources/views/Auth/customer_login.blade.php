<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 min-h-screen flex justify-center items-center">
    <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Customer Login</h2>
        <form method="POST" action="{{ route('customer_login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-2 p-3 w-full border border-gray-300 rounded-md">
                @if ($errors->has('email'))
                    <div class="text-red-500 text-sm mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-2 p-3 w-full border border-gray-300 rounded-md">
                @if ($errors->has('password'))
                    <div class="text-red-500 text-sm mt-2">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="mb-4 flex justify-between items-center">
                <button type="submit"
                    class="w-full py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Login</button>
            </div>
        </form>
        <p class="text-center text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                class="text-blue-500 hover:underline">Register here</a></p>
    </div>
</body>

</html>
