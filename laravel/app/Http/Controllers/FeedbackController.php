<?php

namespace App\Http\Controllers;

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
        return \view('feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return \view('feedback.create');
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
        $file = 'feedback/'.fake()->uuid().'feedback.txt';
        $message = 'author: '.$request->input('author').PHP_EOL.'feedback: '.$request->input('feedback').PHP_EOL;
        file_put_contents($file, $message, FILE_APPEND);
        return  response()->json($request->only(['author','feedback']));
    }
}
