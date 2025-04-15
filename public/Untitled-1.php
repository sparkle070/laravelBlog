<x-app-layout>
    <x-slot name="header">
        <h2 style="color: white;">Dashboard</h2>
    </x-slot>

    <div class="container"style="color: white;">
        <h3 style="color: white;">Your Posts</h3>
        
        <a href="{{ route('posts.create') }}" class="btn btn-primary"style="color: white;">Create New Post</a><br>
        <a href="{{ route('posts.index') }}" class="btn btn-show">All Posts</a><br>
        @if(auth()->check() && auth()->user()->posts->count() > 0)
        @foreach(auth()->user()->posts as $post)
    <div class="post"style="color: white;">
        <h4>{{ $post->title }}</h4> <br>
        <p>{{ Str::limit($post->content, 100) }}</p><br>
        <a href="{{ route('posts.show', $post) }}" class="btn btn-info">Read More</a><br>
      
    </div>
    <hr> {{-- Add this line to separate posts --}}
@endforeach

        @else
            <p>You have no posts.</p>
        @endif

        @if(auth()->check() && auth()->user())
            <hr>
            <h3 style="color: white;">Manage Categories</h3><br>
            <a style="color: white;" href="{{ route('admin.categories.create') }}" class="btn btn-success">Create New Category</a><br><br>
            <a style="color: white;"href="{{ route('admin.categories') }}" class="btn btn-secondary">View Categories</a>
        @endif
    </div>
</x-app-layout>


 today i    added css in home page posts page and category page and customize register form  and dashboard and add functionality to see post relate to category 
