<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <h2>Product Edit</h2>
    <form action="{{ route('products.update', [$product->id]) }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}"/>
        <br><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $product->description }}</textarea>
        <br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="{{ $product->price }}"/>
        <br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
