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
class NewsTransformer extends Fractal\TransformerAbstract{
    public function transform(News $news)
    {
        return [
            "id" => $news->id,
            "title" => $news->title,
            "content" => $news->content,
            "category_id" => $news->category_id,
            "short_des" => $news->short_des,
            "slug" => $news->slug,
            "thumb" => $news->thumb,
            "author" => $news->author,
            "create_date" => $news->create_date

        ];
    }
}