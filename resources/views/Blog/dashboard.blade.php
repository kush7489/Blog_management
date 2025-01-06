<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-400 via-green-500 to-yellow-600 min-h-screen">

    <!-- Navbar or Header -->
    <header class="bg-gray-800 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Blog Posts</h1>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600"><a href="{{route('posts.create')}}" style="text-decoration: none">Create New Post</a></button>
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Logout</button>
            </form>
        </div>
    </header>

    <!-- Dashboard Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-6">Your Blog Posts</h2>

            <!-- Displaying Posts -->
            <div class="space-y-6">
                @forelse ($posts as $index => $post)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                         
                        <h3 class="text-lg font-semibold text-gray-800"><span>{{$index+1}}.</span>  {{ $post->title }}</h3>
                        <p class="mt-2 text-gray-600">{{ Str::limit($post->content, 100) }}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="text-blue-500 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>No posts found. <a href="{{ route('posts.create') }}"
                            class="text-blue-500 hover:underline">Create your first post.</a></p>
                @endforelse
            </div>
        </div>
    </main>

</body>

</html>
