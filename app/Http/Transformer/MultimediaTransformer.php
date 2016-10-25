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
        $created_at= strtotime($mul->created_at);
        $created_at = date("F j, Y, g:i a",$created_at);
        return [
            "id" => $mul->id,
            "title" => $mul->title,
            "short_des" => $mul->short_des,
            "content" => $mul->content,
            "link" => $mul->link,
            "created_at" => $created_at
        ];
    }
}