<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/6/2016
 * Time: 9:54 PM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NewsController extends CoreController{
    public function __construct(){
        parent::__construct();
        $this->name=$this->path."News";
        $this->alias="news";
        $this->viewFields=["title","short_des","content","title","thumb","author","category"];
    }
    public function store(){
        $input = Input::all();
        $mainModel = $this->name;
        unset($input["_token"]);
        $entry =$mainModel::create($input);
        if(isset($entry)){
            return redirect('admin/news')->with('status','News created');
        }else{
            return redirect('admin/news')->with('status','Error when create news');
        }

    }
}