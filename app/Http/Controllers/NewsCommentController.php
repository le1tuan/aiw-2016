<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 11/14/2016
 * Time: 10:44 AM
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Model\News;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NewsCommentController extends ApiController
{
    public $path;
    public $name;
    public $alias;
    public $viewFields;

    public function __construct()
    {
        $this->path = "App\\Model\\";
        $this->name = $this->path . "NewsComment";
    }

    public function index()
    {
        return "aaaaaaaaaaaaaaaaaa";
    }

    public function store()
    {
        $input = Input::all();
        $mainModel = $this->name;
        $entry =$mainModel::create(
            array(
                'author' => Input::get('author'),
                'content' => Input::get('content'),
                'news_id' => Input::get('news_id')
            )
        );
        if(isset($entry)){
            return Response::json(array('success'=>true));
        }else{
            return Response::json(array('success'=>false));
        }

    }
    public function updateComment($slug){
        \Debugbar::disable();
        $news = News::where('slug',$slug)->firstOrFail();
        $comments=$news->newsComment()->get();
        $result = array();
        foreach($comments as $comment){
            $data = array();
            $data['author']= $comment['author'];
            $data['content']=$comment['content'];
            $data['created_at'] = strtotime($comment['created_at']);
            $data['created_at']= date("F j, Y, g:i a",$data['created_at']);
            $result[]=$data;
        }
        $display = json_encode($result);
        echo "data: {$display}\n\n";
        flush();
    }
}