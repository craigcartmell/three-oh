<article>
    @if(!isset($hide_title) || !$hide_title)
        <h2>
            <a href="{{ $article->url }}">
                {{ $article->title }}
                #
            </a>
        </h2>
    @endif

    <div class="container-main">
        <div>
            @foreach($article->tags as $tag)
                <span class="label label-secondary pull-left">{{ $tag->__toString() }}</span>&nbsp;
            @endforeach

            <span class="pull-right text-muted">
                {{ (!empty($article->published_at) ? 'Published ' . $article->published_at->format('jS F Y') . ' and ' : '') }}
                last updated {{ $article->updated_at->diffForHumans() }}
            </span>
        </div>

        <br>

        <div>
            @if(!empty($str_limit))
                {!! str_limit($article->body_parsed, $str_limit, '...<a href="' . $article->url . '">Continue
                    Reading</a>')
                !!}
            @else
                {!! nl2br($article->body_parsed) !!}
            @endif

            <br>

            <div>
                <div class="pull-left">
                    <a href="{{ $article->url }}#comments"><i class="fa fa-comment"></i> Leave a comment</a>
                </div>

                <div class="pull-right">
                    <a href="#" class="share" data-url="{{ $article->url }}" data-share-type="Facebook"
                       data-share-url="http://www.facebook.com/share.php?u={{ $article->url }}&title={{ $article->title }}"
                       target="_blank" title="Share on Facebook">
                        <i class="fa fa-facebook-official"></i>
                    </a>

                    <a href="#" class="share" data-url="{{ $article->url }}" data-share-type="Twitter"
                       data-share-url="https://twitter.com/intent/tweet?url={{ $article->url }}"
                       title="Share on Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <a href="#" class="share" data-url="{{ $article->url }}" data-share-type="Google+"
                       data-share-url="https://plus.google.com/share?url={{ $article->url }}" title="Share on Google+">
                        <i class="fa fa-google-plus"></i>
                    </a>

                    <a href="#" class="share" data-url="{{ $article->url }}" data-share-type="Reddit"
                       data-share-url="//www.reddit.com/submit?url={{ $article->url }}"
                       title="Share on Reddit">
                        <i class="fa fa-reddit"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

</article>