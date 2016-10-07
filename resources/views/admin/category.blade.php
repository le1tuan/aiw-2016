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
            <div class=" col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <a class="btn btn-default" href="news/create">Create News</a>
                        <table class="table table-bordered" style="margin-top: 20px">
                            <tr>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Author</th>
                                <th>Slug</th>
                            </tr>
                            @if(isset($news))
                                @foreach($news as $new)
                                    <tr>
                                        <td>{{$new->title}}</td>
                                        <td>{{$new->short_des}}</td>
                                        <td>{{$new->author}}</td>
                                        <td>{{$new->slug}}</td>
                                    </tr>
                                @endforeach
                            @else
                            @endif

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection