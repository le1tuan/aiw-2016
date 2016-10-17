<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Multimedia;
use App\Model\News;
class Tag extends Model
{
    //
    protected $table = 'tag';

    public function multimedia(){
        return $this->belongsToMany(Multimedia::class);
    }
    public function news(){
        return $this->belongsToMany(News::class);
    }
}
