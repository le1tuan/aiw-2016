<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 11/8/2016
 * Time: 10:07 PM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Tag;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class TagController extends CoreController{
    public function __construct(){
        parent::__construct();
        $this->name=$this->path."Tag";
        $this->alias="tag";
    }

}