<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Create New Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Category Name"/>
        <br><br>
        <label for="description">Description: </label>
        <textarea type="text" name="description" id="description" placeholder="Enter Cateogry Description"></textarea>
        <br><br>
        <button type="submit">
            +Create
        </button>
    </form>
</body>
</html>
