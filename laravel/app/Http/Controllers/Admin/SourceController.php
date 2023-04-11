<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Source;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.sources.index', ['sources' => $sourcesQueryBuilder->getSourcesAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.sources.create');
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
            'name' => 'required',
        ]);
        $source = new Source($request->except('_token')); //News::create()
        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'ource successfully added.');
        }

        return \back()->with('error','Source not added.');
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
    public function edit(Source $source)
    {
        return \view('admin.sources.edit',
            [
                'source'=> $source
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source):RedirectResponse
    {
        $source=$source->fill($request->except('_token'));
        if ($source->save()){
            return redirect()->route('admin.sources.index')->with('success', 'Source successfully updated.');
        }

        return \back()->with('error','ource not added.');
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
