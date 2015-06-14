<article>
    <h2>{{ $article->title }} <a href="{{ $article->url }}">#</a></h2>

    <div>
        @foreach($article->tags as $tag)
            <span class="label label-primary pull-left">{{ $tag->__toString() }}</span>&nbsp;
        @endforeach

        <span class="pull-right text-muted">Published {{ $article->published_at->diffForHumans() }}</span>
    </div>

    <div>
        @if(!empty($str_limit))
            {!! str_limit($article->body_parsed, $str_limit, '...<a href="' . $article->url . '">Continue Reading</a>')
            !!}
        @else
            {!! nl2br($article->body_parsed) !!}
        @endif
    </div>
</article>