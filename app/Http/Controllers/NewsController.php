<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use League\Fractal;
use App\Http\Requests;
use App\Model\News;
use App\Model\Category;
use App\Http\Transformer\NewsTransformer;
use App\Http\Transformer\NewsDetailTransformer;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Controllers\ApiController;
use DB;
class NewsController extends ApiController
{
    //
    public function index()
    {
        $news = News::orderBy('created_at','desc')->paginate(5);
        return $this->respondWithPaginator($news, new NewsTransformer());
    }
    public function show($slug){
        $news = News::where('slug',$slug)->firstOrFail()->get();
        return $this->respondWithCollection($news, new NewsDetailTransformer());
    }

}
