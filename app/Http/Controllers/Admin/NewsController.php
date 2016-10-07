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
    }
    public function store(){
        $input = Input::all();
        var_dump($input);
        $news = new News;
        $news->title=$input['title'];
        $news->short_des=$input['short_des'];
        $news->content=$input['content'];
        $news->slug=$input['title'];
        $news->thumb=$input['thumb'];
        $news->author=$input['author'];
        $news->category_id=$input['category'];
        $news->save();
        return redirect('/');
    }
}