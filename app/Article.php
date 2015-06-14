<?php

namespace ThreeOh;

class Article extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'slug', 'is_published', 'created_by', 'updated_by', 'published_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $appends = ['body_parsed', 'tags_delimited', 'url'];

    protected $casts = ['is_published' => 'boolean'];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'published_at'];
    }

    public function tags()
    {
        return $this->hasMany('ThreeOh\ArticleTag', 'article_id', 'id');
    }

    public function getTagsDelimitedAttribute()
    {
        $tags = '';

        foreach ($this->tags as $tag) {
            $tags .= $tag->__toString() . ',';
        }

        return rtrim($tags, ',');
    }

    public function getUrlAttribute()
    {
        return url('blog/' . $this->slug);
    }

    public function getBodyParsedAttribute()
    {
        $Parsedown = new \Parsedown();

        return $Parsedown->text($this->body);
    }
}
