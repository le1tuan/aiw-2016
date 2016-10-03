<?php
namespace App\Http\Transformer;
use App\Model\Multimedia;
use League\Fractal\TransformerAbstract;

/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/3/2016
 * Time: 10:02 PM
 */
class MultimediaTransformer extends TransformerAbstract{
    public function transform(Multimedia $mul){
        return [
            "id" => $mul->id,
            "title" => $mul->title,
            "short_des" => $mul->short_des,
            "content" => $mul->content,
            "link" => $mul->link
        ];
    }
}