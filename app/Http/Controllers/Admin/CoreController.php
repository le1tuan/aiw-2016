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
    public $path;
    public $name;
    public $alias;
    public $viewFields;
    public function __construct(){
        $this->path="App\\Model\\";
    }
    public function index(){
        /*$news = News::all();*/
        $mainModel = $this->name;
        $results = $mainModel::get();
        if(isset($results)){
            return view("admin.".ucfirst($this->alias).".".$this->alias,[
                'results' => $results
            ]);
        }else{
            return view("admin.".$this->alias);
        }

    }
    public function create(){
        if($this->alias=="news"||$this->alias=="multimedia"){
            $categories = Category::all();
            return view('admin.'.ucfirst($this->alias).".".$this->alias."_create_edit",[
                'categories' => $categories,
            ]);
        }else{
            return view('admin.'.$this->alias."_create_edit");
        }

    }
    public function destroy($id){
        if($this->alias=="news"||$this->alias=="multimedia"){
            $model=$this->name;
            $data= $model::findOrFail($id);
            if($data){
                $data->delete();
                return redirect('admin/'.$this->alias)->with('status',ucfirst($this->alias).' deleted');
            }else{
                return redirect('admin/'.$this->alias)->with('status','Error when delete'.ucfirst($this->alias));
            }
        }else{
            return view('admin.'.$this->alias."_create_edit");
        }

    }
    public function edit($id){
        if($this->alias=="news"||$this->alias=="multimedia"){
            $model=$this->name;
            $result= $model::findOrFail($id);
//            $category= $data->category();
            $categories = Category::all();
            return view('admin.'.ucfirst($this->alias).".".$this->alias."_create_edit",[
                'result' => $result,
                'categories' => $categories,
            ]);
        }else{
            return view('admin.'.$this->alias."_create_edit");
        }
    }
}