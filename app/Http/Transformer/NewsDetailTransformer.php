<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/2/2016
 * Time: 11:47 PM
 */
namespace App\Http\Transformer;
use App\Model\News;
use League\Fractal;
class NewsDetailTransformer extends Fractal\TransformerAbstract{
    public function transform(News $news)
    {
        $comments=$news->newsComment()->get();
        $data =array();

        foreach($comments as $comment){
            $result= array();
            $result['author']=$comment['author'];
            $result['content']=$comment['content'];
            $result['created_at'] = strtotime($comment['created_at']);
            $result['created_at']= date("F j, Y, g:i a",$result['created_at']);

            $data[]= $result;
        }
        $created_at= strtotime($news->created_at);
        $created_at = date("F j, Y, g:i a",$created_at);
        return [
            "id" => $news->id,
            "title" => $news->title,
            "content" => $news->content,
            "category_id" => $news->category_id,
            "slug" => $news->slug,
            "thumb" => $news->thumb,
            "author" => $news->author,
            "created_at" => $created_at,
            "comments" =>$data
        ];
    }
}