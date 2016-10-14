<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ApiController;
use App\Http\Transformer\MultimediaDetailTransformer;
use App\Http\Transformer\MultimediaTransformer;
use App\Model\Multimedia;

/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/3/2016
 * Time: 9:57 PM
 */
class MultimediaController extends ApiController{
    public function index(){
        $muls = Multimedia::paginate(4);
        return $this->respondWithPaginator($muls, new MultimediaTransformer());
    }
    public function show($slug){
        $muls = Multimedia::where('slug','=',$slug)->get();
        return $this->respondWithCollection($muls, new MultimediaDetailTransformer());
    }
}