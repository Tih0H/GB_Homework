<?php

namespace App\Http\Controllers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder, NewsQueryBuilder $newsQueryBuilder): View
    {
        $categoriesList = $categoriesQueryBuilder->getCategoriesAll();
        return \view('categories.index', ['categories' => $categoriesList]);
    }

    public function show(
        int                    $id,
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsQueryBuilder       $newsQueryBuilder)
    {
       return \view('categories.show', ['category' => $categoriesQueryBuilder->getCategoriesById($id)]);
    }
}
