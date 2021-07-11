<?php

namespace App\Http\Controllers;

use News;
use Parser;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;

class ParserController extends Controller
{
    public function guzzleGet()
    {
        $parsedNews = Parser::parserGet();

        $news = News::multipleStore($parsedNews);

        return NewsResource::collection($news);
    }
}
