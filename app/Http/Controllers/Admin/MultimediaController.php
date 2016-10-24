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
use App\Model\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class MultimediaController extends CoreController{
    public function __construct(){
        parent::__construct();
        $this->name=$this->path."Multimedia";
        $this->alias="multimedia";
        $this->viewFields=["title","short_des","content","title","thumb","author","category"];
    }
    public function store(){
        $input = Input::all();
        $mainModel = $this->name;
        unset($input["_token"]);
        $entry =$mainModel::create($input);
        foreach($input['tag'] as $key => $value){
            if($value!=""){
                $tag = new Tag;
                $tag->name=$value;
                $tag->save();
                $entry->tag()->save($tag);
            }
        }
        if(isset($entry)){
            Session::flash('success','Multimedia created');
            return redirect('admin/multimedia');
        }else{
            Session::flash('error','Error when create Multimedia');
            return redirect('admin/multimedia');
        }

    }
    public function update($id){
        $input = Input::all();
        $entry = Multimedia::findOrFail($id);
        $entry->slug='';
        foreach($input['tag'] as $key => $value){
            if($value!=""){
                $tag = new Tag;
                $tag->name=$value;
                $tag->save();
                if(isset($tag->name)){
                    $entry->tag()->save($tag);
                }

            }
        }
        $entry->update($input);
        if(isset($entry)){
            Session::flash('success','Multimedia created');
            return redirect('admin/multimedia');
        }else{
            Session::flash('error','Error when create Multimedia');
            return redirect('admin/multimedia');
        }
    }
}