<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.news.index', ['newsList' => $newsQueryBuilder->getNewsAllWithPagination()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder, SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.news.create',
            [
                'categories' => $categoriesQueryBuilder->getCategoriesAll(),
                'statuses' => NewsStatus::all(),
                'sources'=>$sourcesQueryBuilder->getSourcesAll()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
        ]);
        $news = new News($request->except('_token','category_id')); //News::create()
        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'News successfully added.');
        }

        return \back()->with('error','News not added.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return Response
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder,SourcesQueryBuilder $sourcesQueryBuilder)
    {
        return \view('admin.news.edit',
            [
                'news'=> $news,
                'categories' => $categoriesQueryBuilder->getCategoriesAll(),
                'statuses' => NewsStatus::all(),
                'sources'=>$sourcesQueryBuilder->getSourcesAll()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news):RedirectResponse
    {
        $news=$news->fill($request->except('_token','category_ids'));
        if ($news->save()){
            $news->categories()->sync((array) $request->input('category_ids'));
            return redirect()->route('admin.news.index')->with('success', 'News successfully updated.');
        }

        return \back()->with('error','News not added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
