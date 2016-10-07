<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/7/2016
 * Time: 12:31 PM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CoreController extends Controller{
    public  $path;
    public $name;
    public $alias;
    public function __construct(){
        $this->path="App\\Model\\";
    }
    public function index(){
        /*$news = News::all();*/
        $mainModel = $this->name;
        $results = $mainModel::get();
        if(isset($results)){
            return view("admin.".$this->alias,$results);
        }else{
            return view("admin.".$this->alias);
        }

    }
    public function create(){
        if($this->alias=="news"||$this->alias=="multimedia"){
            $categories = Category::all();
            return view('admin.'.$this->alias."_create_edit",[
                'categories' => $categories,
            ]);
        }else{
            return view('admin.'.$this->alias."_create_edit");
        }

    }
}