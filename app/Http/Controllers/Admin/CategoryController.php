<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/7/2016
 * Time: 6:57 PM
 */
namespace App\Http\Controllers\Admin;
use App\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class CategoryController extends CoreController{
    public function __construct(){
        parent::__construct();
        $this->name=$this->path."Category";
        $this->alias="category";
    }
    public function update($id){
        $input = Input::all();
        $entry = Category::findOrFail($id);
        $entry->update($input);
        if(isset($entry)){
            Session::flash('success','Category Updated');
            return redirect('admin/category');
        }else{
            Session::flash('error','Error when update Category');
            return redirect('admin/category');
        }
    }
    public function store(){
        $input = Input::all();
        $mainModel = $this->name;
        unset($input["_token"]);
        $entry =$mainModel::create($input);
        if(isset($entry)){
            Session::flash('success','Category created');
            return redirect('admin/category');
        }else{
            Session::flash('error','Error when create Category');
            return redirect('admin/category');
        }

    }
}