<article>
    @if(!isset($hide_title) || !$hide_title)
        <h2>
            <a href="{{ $article->url }}">
                {{ $article->title }}
                #
            </a>
        </h2>
    @endif

    <div class="container-fluid">
        <div>
            @foreach($article->tags as $tag)
                <span class="label label-secondary pull-left">{{ $tag->__toString() }}</span>&nbsp;
            @endforeach

            <span class="pull-right text-muted">Published {{ $article->published_at->format('jS F Y') }} and
                last updated {{ $article->updated_at->diffForHumans() }}
            </span>
        </div>

        <br><br>

        <div>
            @if(!empty($str_limit))
                {!! str_limit($article->body_parsed, $str_limit, '...<a href="' . $article->url . '">Continue
                    Reading</a>')
                !!}
            @else
                {!! nl2br($article->body_parsed) !!}
            @endif


            <br><br><br>

            <span class="pull-left">
                <a href="{{ $article->url }}#comments"><i class="fa fa-comment"></i> Leave a comment</a>
            </span>

            <span class="pull-right">
                <a href="#" class="share" data-type="facebook"
                   data-url="http://www.facebook.com/share.php?u={{ $article->url }}&title={{ $article->title }}"
                   target="_blank" title="Share on Facebook">
                    <i class="fa fa-facebook-official"></i>
                </a>

                <a href="#" class="share" data-type="twitter"
                   data-url="https://twitter.com/intent/tweet?url={{ $article->url }}" title="Share on Twitter">
                    <i class="fa fa-twitter"></i>
                </a>

                <a href="#" class="share" data-type="google-plus"
                   data-url="https://plus.google.com/share?url={{ $article->url }}" title="Share on Google+">
                    <i class="fa fa-google-plus"></i>
                </a>

                <a href="#" class="share" data-type="reddit" data-url="//www.reddit.com/submit?url={{ $article->url }}"
                   title="Share on Reddit">
                    <i class="fa fa-reddit"></i>
                </a>
             </span>

        </div>
    </div>

</article>