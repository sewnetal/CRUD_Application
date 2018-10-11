<div class="col-sm-3 offset-sm-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>This demo blog uses laravel framework to perform fully functioning CRUD application.</p>
    </div>
    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            @foreach($archives as $stats)
                <li>

                    <a href="/?month= {{$stats['month']}}&year= {{$stats['year']}}">

                        {{$stats['month']. ' ' .$stats['year']}}

                    </a>

                </li>

            @endforeach

        </ol>
    </div>
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="https://github.com/sewnetal">GitHub</a></li>
            <li><a href="https://www.linkedin.com/feed/">Linkedin</a></li>
            <li><a href="https://www.facebook.com/sewnet.gebremedhin">Facebook</a></li>
        </ol>
    </div>
</div><!-- /.blog-sidebar -->