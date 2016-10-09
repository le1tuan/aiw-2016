<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/3/2016
 * Time: 9:55 PM
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Tag;
class Multimedia extends Model
{
    //
    protected $table = 'multimedia';

    public function tag(){
        return $this->belongsToMany('Tag');
    }
    public function sluggable(){
        return [
            'slug' => [
                'source'=> 'title'
            ]
        ];
    }
}
