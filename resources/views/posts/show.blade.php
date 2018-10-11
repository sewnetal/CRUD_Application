@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">

        <h2 class="blog-post-title">

            {{$posts->title}}

        </h2>
        <p class="blog-post-meta">

            {{$posts->user->name}}
            {{$posts->created_at->toFormattedDateString() }}
        </p>

        <div class="blog-post">
            {{$posts->body}}
        </div>
        @if(Auth::check())
            @if(Auth::user()->id  == $posts->user_id)
                <a href="/posts/{{$posts->id}}/edit">Edit Post</a>
            @endif
        @endif

        <hr>

        <div class="comments">
            <ul class="list-group">

            @foreach($posts->comment as $comment)

                <li class="list-group-item">

                    <strong>
                        {{$comment->user->name}}
                        {{$comment->created_at->diffForHumans() }}: &nbsp;

                    </strong>

                    {{$comment->body}}

                </li>


            @endforeach


            </ul>

        </div>

        <hr>


        @if(Auth::check())
            <div class="card-block">

                @include('layouts.errors')

                <form method="post" action="/posts/{{$posts->id}}/comment">
                    {{csrf_field()}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">

                        <textarea id="body" name="body" class="form-control"></textarea>
                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Add comment</button>

                    </div>

                </form>
            </div>
        @endif


    </div>
@endsection
