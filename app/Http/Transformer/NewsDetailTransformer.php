<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/2/2016
 * Time: 11:47 PM
 */
namespace App\Http\Transformer;
use App\Model\News;
use Illuminate\Support\Facades\DB;
use League\Fractal;
class NewsDetailTransformer extends Fractal\TransformerAbstract{
    public function transform(News $news)
    {   
        //Comment
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
        /**
         * Related news
         */
        $relatedNews = DB::select('SELECT id,title,short_des,slug,thumb,author,created_at
        FROM `news` where category_id=:category_id AND news.id!=:id
        ORDER BY news.created_at desc limit 5',[
            'category_id'=>$news->category_id,
            'id' => $news->id
        ]);
        //Tag 
        $newsTags = $news->tag()->get();
        $tags = array();
        foreach ($newsTags as $tag) {
            $result = array();
            $result['name']=$tag->name;
            $tags[]= $result;
        }

        return [
            "id" => $news->id,
            "title" => $news->title,
            "content" => $news->content,
            "category_id" => $news->category_id,
            "slug" => $news->slug,
            "thumb" => $news->thumb,
            "author" => $news->author,
            "created_at" => $created_at,
            "tags"    => $tags,
            "comments" =>$data,
            "related_news" =>$relatedNews
        ];

    }
}