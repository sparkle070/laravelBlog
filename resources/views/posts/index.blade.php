<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
 
</head>
<body>
@include('layouts.header')
    <div class = "container">
   
<h2>ALL Post </h2>
 @if(session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif
<a href="{{ route('posts.create') }}" class = btn-create>Create New Post</a>
@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="post">
            <div class="postcontainer">
            @if($post->featured_image)
    <img src="{{ asset('uploads/' . $post->featured_image) }}" 
         alt="Featured Image"
         class="featured-image">
@endif


                <h5 class="post-title">
                    {{ $post->title }} 
                </h5>
                <p class="postcontent">
                    {{ Str::limit($post->content, 100) }}
                </p>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-info">Read More</a>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="delete"class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach 
@else
    <p>No posts available.</p>
@endif
<div class="pagination">
    {{ $posts->links() }}
</div>
    </div>
    @include('layouts.footer')
</body>
</html>