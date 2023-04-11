<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\FeedbacksQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(FeedbacksQueryBuilder $feedbackQueryBuilder): View
    {
        return \view('admin.feedbacks.index', ['feedbacks' => $feedbackQueryBuilder->getFeedbacksAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.feedbacks.create');
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
            'author' => 'required',
            'feedback' => 'required',
        ]);
        $feedback = new Feedback($request->except('_token')); //News::create()
        if ($feedback->save()) {
            return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback successfully added.');
        }

        return \back()->with('error','Feedback not added.');
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
    public function edit(Feedback $feedback)
    {
        return \view('admin.feedbacks.edit',
            [
                'feedback'=> $feedback
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback):RedirectResponse
    {
        $feedback=$feedback->fill($request->except('_token'));
        if ($feedback->save()){
            return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback successfully updated.');
        }

        return \back()->with('error','Feedback not added.');
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
