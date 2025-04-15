<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">


</head>
<body>
    @include('layouts.header')

    <div class="container">
    <h2>Categories</h2>
    <div class="category-grid">
        @foreach($categories as $category)
            <div class="category-card">
                <a href="{{ route('category_posts', $category->id) }}" class="category-link">
                    <h3>{{ $category->name }}</h3>
                </a>
            </div>
        @endforeach
    </div>
</div>


    @include('layouts.footer')
</body>
</html>
