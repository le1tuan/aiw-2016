<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\News;

class Category extends Model
{
    //
    protected $table = 'category';
    public function news(){
        return $this->hasMany('News');
    }
}
