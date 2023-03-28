<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use CategoryTrait;
    use NewsTrait;
    public function index()
    {
        return \view('categories.index', ['categories'=> $this->getCategories()]);
    }

    public function show(int $id)
    {
        return \view('categories.show', ['category'=> $this->getCategories($id), 'news'=>$this->getNews()]);
    }
}
