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

        .news {
            margin-left: 20px;
            width: 100%;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
<body class="antialiased">
<div class="container">
    <div class="header"><h1>News page</h1></div>
    <div class="wrap">
        <h3><a href="<?=route('main') ?>">Main</a></h3>
        <div class="news">
            <div style="border: 1px solid grey; width: 100%; margin-bottom: 10px">
                <h2><?= $news['title'] ?></h2>
                <p><?= $news['description'] ?></p>
                <div><strong><?= $news['author'] ?>(<?= $news['created_at'] ?>)</strong>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

