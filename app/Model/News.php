<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class News extends Model
{
    //
    protected $table = 'news';
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
