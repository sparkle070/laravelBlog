<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Include your CSS, make sure Tailwind is being used -->
</head>
<body>
    @include('layouts.header')

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold mb-4">Welcome to My Page</h2>

        {{-- Show Register & Login buttons for guests --}}
        @guest
            <div class="mb-4">
                <a href="{{ route('register') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Register</a>
                <a href="{{ route('login') }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700 ml-4">Login</a>
            </div>
        @endguest

        {{-- Show Dashboard button for logged-in users --}}
        @auth
            <a href="{{ route('dashboard') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">Go to Dashboard</a>
        @endauth

        <h3 class="mt-8 text-xl font-bold mb-4">Latest Posts</h3>
        @foreach($posts as $post)
            <div class="post mb-6">
            @if($post->featured_image)
    <img src="{{ asset('uploads/' . $post->featured_image) }}" 
         alt="Featured Image"
         class="featured-image">
@endif

                <h4 class="text-lg font-semibold">{{ $post->title }}</h4>
                <p class="text-gray-700">{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:text-blue-700">Read More</a>
            </div>
            <hr>
        @endforeach

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
