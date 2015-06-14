<?php

namespace ThreeOh\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use ThreeOh\Article;
use ThreeOh\ArticleTag;
use ThreeOh\Tag;

class ArticleController extends Controller
{
    /**
     * Get an article by slug
     *
     * @param string $slug
     *
     * @return View
     */
    public function getBySlug($slug = '')
    {
        $article = Article::query()->where('slug', $slug)->first();

        if (empty($article)) {
            return view('errors/404');
        }

        return view('articles/article', ['article' => $article]);
    }

    /**
     * Edit an article
     *
     * @param int $id
     *
     * @return View
     */
    public function getEdit($id = 0)
    {
        $article = new Article();

        if (intval($id)) {
            $article = Article::query()->findOrFail($id);
        }

        return view('articles/edit', ['article' => $article]);
    }

    /**
     * Process an article
     *
     * @param int $id
     *
     * @return View
     */
    public function postEdit($id = 0)
    {
        $article = new Article();

        if (intval($id)) {
            $article = Article::query()->findOrFail($id);
        }

        $this->validate($this->request, ['title' => 'required|max:255', 'body' => 'required', 'is_published' => 'boolean']);

        DB::transaction(function () use ($article) {
            $tags = explode(',', $this->request->input('tags'));

            $article_tags = [];

            foreach ($tags as $t) {
                $t   = trim($t);
                $tag = Tag::query()->where('tag', $t)->first();

                if (empty($tag)) {
                    $tag = Tag::create(
                        ['tag'        => $t,
                         'created_by' => $this->auth->user()->getKey(),
                         'updated_by' => $this->auth->user()->getKey(),
                        ]
                    );
                }

                $article_tags[] = new ArticleTag(
                    [
                        'tag_id'     => $tag->getKey(),
                        'created_by' => $this->auth->user()->getKey(),
                        'updated_by' => $this->auth->user()->getKey(),
                    ]
                );
            }

            $article->title        = $this->request->input('title');
            $article->body         = $this->request->input('body');
            $article->is_published = $this->request->input('is_published', false);
            $article->created_by   = $this->auth->user()->getKey();
            $article->updated_by   = $this->auth->user()->getKey();

            if ($article->is_published) {
                $article->published_at = new Carbon();
            }

            if (! $article->exists) {
                $article->slug = str_slug($this->request->input('title'));
            }

            $article->save();

            $article->tags()->delete();
            $article->tags()->saveMany($article_tags);
        });

        return redirect()->to('/admin');
    }
}
