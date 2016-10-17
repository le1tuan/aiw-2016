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
use App\Model\Tag;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class NewsController extends CoreController{
    public function __construct(){
        parent::__construct();
        $this->name=$this->path."News";
        $this->alias="news";
        $this->viewFields=["title","short_des","content","title","thumb","author","category"];
    }
    public function saveFile($file){
        $file->move('uploads',$file->getClientOriginalName());
    }
    public function store(){
        if(Input::hasFile('thumb')){
            $file = Input::file('thumb');
            $this->saveFile($file);
        }
        $input = Input::all();
        $input['thumb']=$file->getClientOriginalName();
        $mainModel = $this->name;
        unset($input["_token"]);
        $entry =$mainModel::create($input);
        $tag = Tag::findOrFail(1);
        $entry->tag()->save($tag);
        if(isset($entry)){
            Session::flash('success','News created');
            return redirect('admin/news');
        }else{
            Session::flash('error','Error when create news');
            return redirect('admin/news');
        }

    }
    public function update($id){
        $input = Input::all();
        $data = News::findOrFail($id);
        if(Input::hasFile('thumb')){
            $file = Input::file('thumb');
            $this->saveFile($file);
            $input['thumb']=$file->getClientOriginalName();
        }
        $data->slug='';
        $data->update($input);
        if(isset($data)){
            Session::flash('success','News Updated');
            return redirect('admin/news');
        }else{
            Session::flash('error','Error when update news');
            return redirect('admin/news');
        }
    }
}