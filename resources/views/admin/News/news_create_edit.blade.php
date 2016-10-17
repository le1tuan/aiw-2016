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
                        @if(isset($result))
                            <form action="{{ url('admin/news/'.$result->id) }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @else
                                    <form action="{{ url('admin/news') }}" method="post" enctype="multipart/form-data">
                                        @endif
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title"
                                                   value="{{ isset($result)?$result->title:''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Short_des</label>
                                            <input type="text" class="form-control" name="short_des"
                                                   placeholder="short_des"
                                                   value="{{ isset($result)?$result->short_des:''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Content</label>
                                            <textarea id="editor1" name="content" cols="80" rows="10">{{ isset($result)?$result->content:''}}
                                            </textarea>
                                            <script>
                                                CKEDITOR.replace('editor1');
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <label>Thumb</label>
                                            @if(isset($result))
                                                <img src="{{url('uploads/'.$result->thumb)}}" alt="thumb" style="width: 100px"/>
                                            @endif
                                            <input type="file" name="thumb">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Author</label>
                                            <input type="text" class="form-control" name="author"
                                                   placeholder="Password" value="{{ isset($result)?$result->author:''}}">
                                        </div>
                                        @if(isset($categories))
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                <select name="category_id" class="form-control">
                                                    <?php var_dump($categories) ?>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ isset($result)&&($result->category_id==$category->id)?'selected':''}}        >{{ $category->name }}</option>
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