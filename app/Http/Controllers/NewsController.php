<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Fractal;
use App\Http\Requests;
use App\Model\News;
use App\Model\Category;
use App\Http\Transformer\NewsTransformer;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Controllers\ApiController;

class NewsController extends ApiController
{
    //
    public function index($slug)
    {
        $paginator = News::paginate();
        return $this->respondWithPaginator($paginator,new NewsTransformer());

    }
}
