<?php

namespace App\Http\Controllers;

use App\Http\Transformer\SearchTransformer;
use Illuminate\Http\Request;
use App\Model\News;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SearchController extends ApiController
{
    //
    public function search($title){
        $relatedNews = News::where('title','like','%'.$title.'%')->paginate(2);
        return $this->respondWithPaginator($relatedNews, new SearchTransformer());
    }
}
