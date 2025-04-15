<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post </title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
    @include('layouts.header')
<div class="container">
        <h2>Edit Post</h2>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}" required> <br><br>

    <label>Content:</label>
    <textarea name="content" required>{{ old('content', $post->content) }}</textarea><br><br>
    <div class="featuredimagecontainer">
            <label for="featuredimage" class="featuredimage"> Select Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" value="{{ old('content', $post->content) }}"><br><br>
        </div>
            <label for="category_id" class="category">Category</label>
            <select name="category_id" id="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

    <button type="submit">Update Post</button>
</form>

    </div>
    @include('layouts.footer')

</body>
</html>