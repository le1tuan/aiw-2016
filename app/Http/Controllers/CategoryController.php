<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Http\Transformer\CategoryTransformer;
use App\Model\Category;
use App\Model\News;
use DB;
use App\Http\Transformer\SearchTransformer;
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/18/2016
 * Time: 10:49 PM
 */
class CategoryController extends ApiController{
    public function index()
    {
        $categories = Category::all();
        return $this->respondWithCollection($categories, new CategoryTransformer());
    }
    public function show($name){
        $cat = Category::where('name',$name)->get();
        foreach ($cat as $c) {
        	$result = $c->news()->orderBy('created_at','desc')->paginate(3);	
        }
        return $this->respondWithPaginator($result, new SearchTransformer());
    }
}