<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
</head>
<body>
    <h2>Product List</h2>
    <a href="{{ route('products.create') }}">+Create</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <h3>Product ID: {{ $product->id }}</h3>
                <p>Name: {{ $product->name }}</p>
                <p>Description: {{ $product->description }}</p>
                <p>Price: {{ $product->price }}</p>
                <a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a>
                <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
