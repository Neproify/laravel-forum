<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'topic_id', 'user_id', 'content'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'topic_id');
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
}
