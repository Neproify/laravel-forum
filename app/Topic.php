<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Post;

class Topic extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'forum_id', 'user_id', 'name', 'content'
    ];

    public function getUrl()
    {
        return url('topic', ['id' => $this->id, 'name' => str_slug($this->name)]);
    }

    public function forum()
    {
        return $this->belongsTo('App\Forum');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function canEdit()
    {
        if(Auth::check() == false)
            return false;
        return $this->user_id == Auth::user()->id or Auth::user()->isAdmin() == true;
    }

    public function setNewestPost(Post $post)
    {
        $this->last_post_id = $post->id;
        return $this;
    }

    public function getNewestPost()
    {
        return Post::find($this->last_post_id);
    }
}