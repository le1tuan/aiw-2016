<?php
/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 10/7/2016
 * Time: 12:31 PM
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CoreController extends Controller
{
    public $path;
    public $name;
    public $alias;
    public $viewFields;

    public function __construct()
    {
        $this->path = "App\\Model\\";
    }

    public function index()
    {
        $mainModel = $this->name;
        $results = $mainModel::paginate(5);
        if (isset($results)) {
            return view("admin." . ucfirst($this->alias) . "." . $this->alias, [
                'results' => $results
            ]);
        } else {
            return view("admin." . ucfirst($this->alias) . "." . $this->alias);
        }

    }

    public function create()
    {
        if ($this->alias == "news" || $this->alias == "multimedia") {
            $categories = Category::all();
            $tags = Tag::all();
            return view('admin.' . ucfirst($this->alias) . "." . $this->alias . "_create_edit", [
                'categories' => $categories,
                'tags' => $tags
            ]);
        } else {
            return view('admin.' .ucfirst($this->alias).".". $this->alias . "_create_edit");
        }

    }

    public function destroy($id)
    {
        $model = $this->name;
        $data = $model::findOrFail($id);
        if ($data) {
            if ($this->alias == "news" || $this->alias == "multimedia") {
                $tags = $data->tag()->get();
                $data->tag()->detach($tags);
                $data->delete();
                return redirect('admin/' . $this->alias)->with('status', ucfirst($this->alias) . ' deleted');

            } else {
                $data->delete();
                return redirect('admin/' . $this->alias)->with('status', ucfirst($this->alias) . ' deleted');
            }
        } else {
            return redirect('admin/' . $this->alias)->with('status', 'Error when delete' . ucfirst($this->alias));
        }
    }

    public function edit($id)
    {
        $model = $this->name;
        if ($this->alias == "news" || $this->alias == "multimedia") {
            $result = $model::findOrFail($id);
            $categories = Category::all();
            $tag = $result->tag()->get();
            return view('admin.' . ucfirst($this->alias) . "." . $this->alias . "_create_edit", [
                'result' => $result,
                'categories' => $categories,
                'tag' => $tag
            ]);
        } else {
            $result = $model::findOrFail($id);
            return view('admin.' . ucfirst($this->alias) . "." . $this->alias . "_create_edit",[
                'result' => $result,
            ]);
        }
    }

    public function update($id)
    {
        $model = $this->name;
        $input = Input::all();
        $data = $model::findOrFail($id);
        if ($this->alias == "news" || $this->alias == "multimedia") {
            $data->slug = '';
        }
        $data->update($input);
        if (isset($data)) {
            Session::flash('success', 'Updated ' . $this->alias);
            return redirect('admin/'.$this->alias);
        } else {
            Session::flash('error', 'Error when update ' . $this->alias);
            return redirect('admin/'.$this->alias);
        }
    }
}