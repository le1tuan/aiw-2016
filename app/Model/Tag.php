<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Multimedia;
use App\Model\News;
class Tag extends Model
{
    //
    protected $table = 'tag';
    protected $fillable =["name"];
    public function multimedia(){
        return $this->belongsToMany(Multimedia::class)->withTimestamps();
    }
    public function news(){
        // return $this->belongsToMany(News::class)->withTimestamps();
        return $this->belongsToMany(News::class)->withTimestamps();
    }

}
