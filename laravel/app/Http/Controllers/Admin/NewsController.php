<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
                'sources' => $sourcesQueryBuilder->getSourcesAll()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());
        if ($news) {
            $news->categories()->attach($request->getCategories());
            return redirect()->route('admin.news.index')->with('success', 'News successfully added.');
        }

        return \back()->with('error', 'News not added.');
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
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder, SourcesQueryBuilder $sourcesQueryBuilder)
    {
        return \view('admin.news.edit',
            [
                'news' => $news,
                'categories' => $categoriesQueryBuilder->getCategoriesAll(),
                'statuses' => NewsStatus::all(),
                'sources' => $sourcesQueryBuilder->getSourcesAll()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategories());
            return redirect()->route('admin.news.index')->with('success', trans('messages.admin.news.success'));
        }

        return \back()->with('error', trans('messages.admin.news.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news): JsonResponse
    {
        try{
            $news->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
