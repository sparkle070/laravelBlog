<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts in {{ $category->name }}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    @include('layouts.header')

    <div class="container">
        <h2>Posts in {{ $category->name }}</h2>

        @if($posts->count() > 0)
           
            @foreach($posts as $post)
                <div>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}">Read More</a>
                </div>
                <hr>
            @endforeach

            <!-- Pagination links -->
            {{ $posts->links() }}
        @else
           
            <p>No posts related to this {{$category->name}} category.</p>
        @endif
    </div>

    @include('layouts.footer')
</body>
</html>
