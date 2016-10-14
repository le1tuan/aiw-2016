<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/2/2016
 * Time: 11:47 PM
 */
namespace App\Http\Transformer;
use App\Model\Multimedia;
use League\Fractal;
class MultimediaDetailTransformer extends Fractal\TransformerAbstract{
    public function transform(Multimedia $muls)
    {
        return [
            "id" => $muls->id,
            "title" => $muls->title,
            "content" => $muls->content,
            "category_id" => $muls->category_id,
            "slug" => $muls->slug,
            "thumb" => $muls->thumb,
            "author" => $muls->author,
            "create_date" => $muls->create_date
        ];
    }
}