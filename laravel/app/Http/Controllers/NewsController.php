<?php

namespace App\Http\Controllers;


use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{

    public function index(NewsQueryBuilder $newsQueryBuilder)
    {

        return \view('news.index',
            [
                'news' => $newsQueryBuilder->getNewsAllWithPagination()
            ]);
    }

    public
    function show(int $id, NewsQueryBuilder $newsQueryBuilder)
    {
        $newsList = $newsQueryBuilder->getNewsById($id);
        return \view('news.show', ['news' => $newsList]);
    }
}
