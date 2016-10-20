<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Http\Transformer\CategoryTransformer;
use App\Model\Category;

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
}