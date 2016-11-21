<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 11/22/2016
 * Time: 12:21 AM
 */
namespace App\Http\Transformer;
use League\Fractal;
use App\Model\News;
class SearchTransformer extends Fractal\TransformerAbstract{
    public function transform(News $news)
    {
        $created_at= strtotime($news->created_at);
        $created_at = date("F j, Y, g:i a",$created_at);
        return [
            "id" => $news->id,
            "title" => $news->title,
            "category_id" => $news->category_id,
            "short_des" => $news->short_des,
            "slug" => $news->slug,
            "thumb" => $news->thumb,
            "author" => $news->author,
            "created_at" => $created_at
        ];
    }
}