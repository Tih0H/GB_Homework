<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NewsTrait;

class NewsController extends Controller
{
    use NewsTrait;
    public function index()
    {
        return \view('news.index', ['news'=> $this->getNews()]);
    }

    public function show(int $id)
    {
        return \view('news.show', ['news'=> $this->getNews($id)]);
    }
}
