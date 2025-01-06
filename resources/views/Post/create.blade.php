<!-- resources/views/posts/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-400 via-green-500 to-yellow-600 min-h-screen">

    <!-- Navbar -->
    <header class="bg-gray-800 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Blog Posts</h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"><a
                        href="{{ route('dashboard') }}" style="text-decoration: none">Back</a></button>
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Logout</button>
            </form>
        </div>
    </header>


    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-6">Your Blog Posts</h2>
        </div>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-700"><b>Post Title</b></label>
                <input type="text" name="title" id="title"
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter post title" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-semibold text-gray-700"><b>Post Content</b></label>
                <textarea name="content" id="content" rows="6"
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter post content" required></textarea>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Create
                    Post</button>
            </div>
        </form>
    </main>



</body>

</html>
