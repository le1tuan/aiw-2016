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
use Cviebrock\EloquentSluggable\Sluggable;
class Multimedia extends Model
{
    use Sluggable;
    //
    protected $table = 'multimedia';
    protected $fillable =["title","short_des","content","title","link","author","category_id"];
    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
    public function sluggable(){
        return [
            'slug' => [
                'source'=> 'title'
            ]
        ];
    }
}
