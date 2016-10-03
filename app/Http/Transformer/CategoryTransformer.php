<?php
namespace App\Http\Transformer;
use App\Model\Category;
use League\Fractal\TransformerAbstract;

/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/3/2016
 * Time: 5:30 PM
 */
class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $news)
    {
        return [
            "id" => $news->id,
        ];
    }
}