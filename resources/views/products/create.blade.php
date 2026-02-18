<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <h2>Create New Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Product Name"/>
        <br><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" placeholder="Enter Product Description"></textarea>
        <br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" placeholder="Enter Price"/>
        <br><br>
        <button type="submit">+Create</button>
    </form>
</body>
</html>
