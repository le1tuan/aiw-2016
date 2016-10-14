@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{  url('admin/news') }}">News</a></li>
                            <li><a href="{{  url('admin/multimedia') }}">Multimedia</a></li>
                            <li><a href="{{  url('admin/tag') }}">Tag</a></li>
                            <li><a href="{{  url('admin/category') }}">Category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                    <div class="panel-body">
                        <form action="{{ url('admin/news') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">short_des</label>
                                <input type="text" class="form-control" name="short_des" placeholder="short_des">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">content</label>
                                <textarea id="editor1" name="content" cols="80" rows="10">
                                </textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Thumb</label>
                                <input type="file" name="thumb">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">author</label>
                                <input type="text" class="form-control" name="author" placeholder="Password">
                            </div>
                            @if(isset($categories))
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <select name="category_id">
                                        <?php var_dump($categories) ?>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input type="text" name="tag[]">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection