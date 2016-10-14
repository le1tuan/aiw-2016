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
        if(isset($entry)){
            return redirect('admin/news')->with('status','News created');
        }else{
            return redirect('admin/news')->with('status','Error when create news');
        }

    }
    public function update($id){
        $input = Input::all();
        $data = News::findOrFail($id);
        $data->title=$input['title'];
        $data->short_des=$input['short_des'];
        $data->content=$input['content'];
        if(Input::hasFile('thumb')){
            $file = Input::file('thumb');
            $this->saveFile($file);
            $input['thumb']=$file->getClientOriginalName();
            $data->thumb=$input['thumb'];
        }
        $data->author=$input['author'];
        $data->slug=null;
        $data->save();
        if(isset($entry)){
            return redirect('admin/news')->with('status','News Updated');
        }else{
            return redirect('admin/news')->with('status','Error when update news');
        }
    }
}