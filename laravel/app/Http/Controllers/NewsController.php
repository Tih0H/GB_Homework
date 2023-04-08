<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
        $model = new News();
        $newsList = $model->getNews();
        return \view('news.index', ['news' => $newsList]);
    }

        public
        function show(int $id)
        {
            $model = new News();
            $newsList = $model->getNewsById($id);


        return \view('news.show', ['news' => $newsList]);
        }
}
