<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>

<body>
    {{-- @php
        $articles = [
            [
                'id' => 1,
                'title' => 'First Article',
                'content' => 'This is the content of the first article',
            ],
            [
                'id' => 2,
                'title' => 'Second Article',
                'content' => 'This is the content of the second article',
            ],
            [
                'id' => 3,
                'title' => 'Third Article',
                'content' => 'This is the content of the third article',
            ],
            [
                'id' => 4,
                'title' => 'Fourth Article',
                'content' => 'This is the content of the four article',
            ],
            [
                'id' => 5,
                'title' => 'Five Article',
                'content' => 'This is the content of the five article',
            ],
        ];
    @endphp --}}

    <h2>Article List</h2>

    {{-- {{ dd($articles) }} --}}
    <ul>
        @foreach ($articles as $data)
            <li>
                <h3>{{ $data['id'] }} : {{ $data['title']}}</h3>
                <p>{{ $data['content'] }}</p>
                <a href="{{route('articles.show', ['id' => $data['id']])}}">show</a>
            </li>
        @endforeach
    </ul>
</body>

</html>
