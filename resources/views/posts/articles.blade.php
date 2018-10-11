<div class="blog-post">

    <h2 class="blog-post-title">

        <a href="/posts/{{$articles->id}}">

        {{$articles->title}}

        </a>
    </h2>

    <p class="blog-post-meta">

        {{$articles->user->name }} on

        {{$articles->created_at->toFormattedDateString() }}

    </p>

    {{$articles->body}}

</div><!-- /.blog-post -->