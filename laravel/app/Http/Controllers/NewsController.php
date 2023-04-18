<?php

namespace App\Http\Controllers;


use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{

    public function index(NewsQueryBuilder $newsQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder)
    {

        return \view('news.index',
            [
                'news' => $newsQueryBuilder->getNewsAllWithPagination(),
                'categories' => $categoriesQueryBuilder->getCategoriesAll()
            ]);
    }

    public
    function show(int $id, NewsQueryBuilder $newsQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        return \view('news.show', ['news' => $newsQueryBuilder->getNewsById($id)]);
    }
}
