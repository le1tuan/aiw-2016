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
}