<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 style="color: white;">Dashboard</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primaryy">Create New Post</a>
        <a href="{{ route('posts.index') }}" class="btn btn-infoo">Your Posts</a>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Create New Category</a>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">View Categories</a>
        <a href="{{ route('posts.index') }}" class="btn btn-infoo">All Posts</a>
        <!-- <a href="{{ route('categories') }}"  class="btn btn-secondary">View Categories</a> -->

        <form method="POST" action="{{ route('logout') }}" class="logout-form">
    @csrf
    <button class="btn-logout"type="submit">Logout</button>
</form>


    </div>

    <!-- Main Content Area -->
    <div class="content-area">
        <div class="container">
            <!-- User Info Section -->
            <div class="user-info">
          
                <h3>User Details</h3>
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Phone No:</strong> {{ auth()->user()->phoneno }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Gender: </strong>{{ auth()->user()->gender }}</p>
                <!-- <p><strong>Role:</strong>  -->
                    <!-- @if(auth()->user()->is_admin) 
                        Admin 
                    @else 
                        User 
                    @endif -->
                </p>
                <a href="{{ route('home') }}" class="btn btn-home">BackToHome</a>
            </div>
        </div>
    </div>

</body>
</html>



