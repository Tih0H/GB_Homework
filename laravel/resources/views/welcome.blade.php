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
    <div class="header"><h1>Welcome page</h1></div>
    <div class="wrap">
        <li>
            <ul><h3>Links</h3></ul>
            <ul><a href="<?=route('info') ?>">Info</a></ul>
            <ul><a href="<?=route('news') ?>">News</a></ul>
            <ul><a href="<?=route('categories') ?>">Categories</a></ul>
        </li>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dignissimos hic laudantium maxime
            mollitia necessitatibus officiis qui quisquam ullam voluptates. Aliquam assumenda corporis distinctio est
            itaque libero magnam quidem voluptate!</p>
    </div>
</div>
</body>
</html>
