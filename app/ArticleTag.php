<?php

namespace ThreeOh;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'article_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['article_id', 'tag_id', 'created_by', 'updated_by'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function tag()
    {
        return $this->hasOne('ThreeOh\Tag', 'id', 'tag_id');
    }

    public function __toString()
    {
        return (string)$this->tag->tag;
    }
}
