<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>News</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }

        .container {
            margin: 0 auto;
            max-width: 1024px;

        }

        li {
            list-style-type: none;
            padding: 0 30px 0 0;
        }

        .wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .header {
            padding: 20px 0;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body class="antialiased">
<div class="container">
    <div class="header"><h1>Categories page</h1></div>
    <div class="wrap">
        <li>
            <ul><h3>Categories</h3></ul>
            @foreach($categories as $category)
                <ul><a href="{{route('categories.show',['id'=>$category['id']])}} ">{{$category['name']}} </a></ul>
            @endforeach
        </li>
    </div>
</div>
</body>
</html>
