@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>
                <div class="panel-body">
                    <ul>
                        <li><a href="admin/news">News</a></li>
                        <li><a href="admin/multimedia">Multimedia</a></li>
                        <li><a href="admin/tag">Tag</a></li>
                        <li><a href="admin/category">Category</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
