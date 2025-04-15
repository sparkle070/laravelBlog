<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
</head>
<body>
    <header class="header">
        <div class="logo">MyBlog</div>
        <div class="auth-links">
            <nav>
            <nav>
    <ul>
        {{-- Check if the current route is home or posts.index --}}
        @if(Route::currentRouteName() == 'home' || Route::currentRouteName() == 'posts.index')
            <li>
                <a href="{{ route('categories') }}">View Categories</a>
            </li>
        @endif

        <li>
            <a class="about" href="{{ route('about') }}">About-Us</a>
        </li>
    </ul>
</nav>
        </div>
    </header>
</body>
</html>
