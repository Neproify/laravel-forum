<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;

class Forum extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description'
    ];

    public function getUrl()
    {
        return url('forum', ['id' => $this->id, 'name' => str_slug($this->name)]);
    }

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function setNewestTopic(Topic $topic)
    {
        $this->last_topic_id = $topic->id;
        return $this;
    }

    public function getNewestTopic()
    {
        return Topic::find($this->last_topic_id);
    }
}
