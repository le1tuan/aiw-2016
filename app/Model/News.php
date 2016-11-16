<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\Tag;
use Cviebrock\EloquentSluggable\Sluggable;


class News extends Model
{
    use Sluggable;
    //
    protected $table = 'news';
    protected $fillable = ["title", "short_des", "content", "title", "thumb", "author", "category_id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function newsComment()
    {
        return $this->hasMany(NewsComment::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
