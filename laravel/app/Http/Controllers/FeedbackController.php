<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return \view('feedbacks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return \view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'author'=>'required',
            'feedback'=>'required'
        ]);

        $feedback = new Feedback($request->except('_token')); //News::create()
        if ($feedback->save()) {
            return redirect()->route('main')->with('success', 'Feedback successfully added.');
        }

        return \back()->with('error','Feedback not added.');
    }
}
