<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
     <style>
        
     </style>
</head>
<body>
@include('layouts.header')
<div class="container">

    <h2>Create a New Post</h2>

    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="titlecontainer">
            <label for="title" class="title">Title</label>
            <input type="text" name="title" id="title" class="title" required>
        </div>

        <div class="contentcontainer">
            <label for="content" class="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
        </div>

        <div class="featuredimagecontainer">
            <label for="featuredimage" class="featuredimage"> Select Featured Image</label>
            <input type="file" name="featured_image" id="featured_image"><br><br>
        </div>
        <div class="categorycontainer">
            <label for="category_id" class="category">Category</label>
            <select name="category_id" id="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@include('layouts.footer')

</body>
</html>
