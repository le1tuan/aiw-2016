<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Multimedia;
use App\Model\News;

class NewsComment extends Model
{
    //
    protected $table = 'news_comment';
    protected $fillable = ["author", "content", "news_id"];

    public function news()
    {
        return $this->belongsTo(News::class)->withTimestamps();
    }
}
