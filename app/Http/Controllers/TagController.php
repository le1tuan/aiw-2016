<?php

namespace App\Http\Controllers;

use App\Http\Transformer\SearchTransformer;
use Illuminate\Http\Request;
use App\Model\Tag;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TagController extends ApiController
{
    //
    public function index(){
        
    }
    public function show($name){
    	 $tag = Tag::where('name',$name)->get();
    	 foreach ($tag as $t) {
        	$result = $t->news()->orderBy('created_at','desc')->paginate(3);		
        	}
        return $this->respondWithPaginator($result, new SearchTransformer());
    }

}
