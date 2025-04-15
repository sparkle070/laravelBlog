<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categories</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
@include('layouts.header')
<div class="container">

    <h1>Categories</h1>
    <a href="{{ route('admin.categories.create') }}">Create Category</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a> |
                <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@include('layouts.footer')

</body>
</html>