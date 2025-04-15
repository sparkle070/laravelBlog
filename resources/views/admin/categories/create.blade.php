<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create Category </title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
<div class="container">
@include('layouts.header')
    <h2>Create Category</h2>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Category Name" required>
        <button type="submit">Save</button>
    </form>
</div>
@include('layouts.footer')

</body>
</html>