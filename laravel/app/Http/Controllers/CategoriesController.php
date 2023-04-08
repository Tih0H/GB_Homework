<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
        public function index()
    {
        $model=new Category();
        $categoriesList = $model->getCategories();
        return \view('categories.index', ['categories'=> $categoriesList]);
    }

    public function show(int $id)
    {
        $model=new Category();
        $modelNews=new News();
        $categoriesList = $model->getCategoriesById($id);
        return \view('categories.show', ['category'=> $categoriesList, 'news'=>$modelNews]);
    }
}
