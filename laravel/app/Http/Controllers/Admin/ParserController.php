<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\QueryBuilders\SourcesQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser, SourcesQueryBuilder $sourcesQueryBuilder)
    {
        $sources = $sourcesQueryBuilder->getSourcesAll();

        foreach ($sources as $source){

            \dispatch(new JobNewsParsing($source->source_url));
        }
        return "Job for parsing created";
    }
}
