<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Category List</h2>
    <a href="{{ route('categories.create') }}">+Create</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                <h3>Category ID: {{ $category->id }}</h3>
                <p>Category Name: {{ $category->name }}</p>
                <p>Description: {{ $category->description }}</p>
                <a href="{{route('categories.edit', ['id' => $category->id])}}">Edit</a>
                <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
