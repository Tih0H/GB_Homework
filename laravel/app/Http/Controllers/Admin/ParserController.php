<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {
        $load = $parser->setLink("https://news.rambler.ru/rss/photo/")->getParseData();
        $parser->saveParseDataToDb();
        dd($load['news']);
    }
}
