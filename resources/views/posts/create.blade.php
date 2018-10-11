@extends('layouts.master')



@section('content')

    <div class="col-sm-8 blog-main">

        <h1> Create a Posts</h1>

        <hr>

        @include('layouts.errors')

        <form method="POST" action="/posts">

           @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title"  id="title">
            </div>

            <div class="form-group">
                <label for="body">Body: </label>
                <textarea id="body" name="body" class="form-control"></textarea>
            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-primary">publish</button>

            </div>

        </form>

    </div>

@endsection