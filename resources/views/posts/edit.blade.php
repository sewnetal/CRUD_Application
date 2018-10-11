@extends('layouts.master')



@section('content')

    <div class="col-sm-8 blog-main">

        <h1> Create a Posts</h1>

        <hr>

        @include('layouts.errors')

        <form method="POST" action="/posts/{{$posts->id}}/update">

            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title"  id="title" value="{{$posts->title}}">
            </div>

            <div class="form-group">
                <label for="body">Body: </label>
                <textarea id="body" name="body" class="form-control" >{{$posts->body}}</textarea>
            </div>

            <div class="form-group">
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn btn-primary">publish</button>

            </div>


        </form>
        <form method="POST" action="/posts/{{$posts->id}}/destroy">
            @csrf

            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-primary">Delete Post</button>
        </form>

    </div>

@endsection