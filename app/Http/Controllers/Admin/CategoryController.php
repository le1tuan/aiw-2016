<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/7/2016
 * Time: 6:57 PM
 */
namespace App\Http\Controllers\Admin;
class CategoryController extends CoreController{
    public function __construct(){
        parent::__construct();
        $this->name=$this->path."Category";
        $this->alias="category";
    }
}