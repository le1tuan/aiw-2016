<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/6/2016
 * Time: 2:36 PM
 */
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

}