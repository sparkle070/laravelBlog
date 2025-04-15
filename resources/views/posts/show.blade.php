<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Post</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
@include('layouts.header')
    <div class="container">
    @if($post->featured_image)
    <img src="{{ asset('uploads/' . $post->featured_image) }}" 
         alt="Featured Image"
         class="featured-image">
@endif

        <h2>{{ $post->title }}</h2>  
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </div>
    @include('layouts.footer')

</body>
</html>
