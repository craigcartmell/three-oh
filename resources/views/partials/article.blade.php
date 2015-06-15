<article class="container-fluid">
    <h2>
        {{ $article->title }}
        <a href="{{ $article->url }}">
            #
        </a>
    </h2>

    <div>
        @foreach($article->tags as $tag)
            <span class="label label-secondary pull-left">{{ $tag->__toString() }}</span>&nbsp;
        @endforeach
        <span class="pull-right text-muted">Published {{ $article->published_at->diffForHumans() }}</span>
    </div>

    <br>

    <div>
        @if(!empty($str_limit))
            {!! str_limit($article->body_parsed, $str_limit, '...<a href="' . $article->url . '">Continue Reading</a>')
            !!}
        @else
            {!! nl2br($article->body_parsed) !!}
        @endif


        <br><br><br>

            <span class="pull-left">
                <a href="{{ $article->url }}#comments"><i class="fa fa-comment"></i> Leave a comment</a>
            </span>

            <span class="pull-right">
            <a href="http://www.facebook.com/share.php?u={{ $article->url }}&title={{ $article->title }}"
               target="_blank">
                <i class="fa fa-facebook-official"></i>
            </a>

            <a class="btn-" href="#">
                <i class="fa fa-twitter"></i>
            </a>

            <a href="#">
                <i class="fa fa-google-plus"></i>
            </a>

            <a href="#">
                <i class="fa fa-reddit"></i>
            </a>
        </span>

    </div>

</article>