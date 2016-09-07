<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use App\Http\Requests;
use App\Topic;
use App\Forum;

class TopicController extends Controller
{
    public function show($id, $name)
    {
        $topic = Topic::findOrFail($id);
        $posts = $topic->posts()->paginate(15);
        return view('forum.topic.show', ['topic' => $topic, 'posts' => $posts]);
    }

    public function createForm($id)
    {
        return view('forum.topic.new', ['id' => $id, 'forum' => Forum::findOrFail($id)]);
    }

    protected function create(Request $request)
    {
        $this->validate($request, [
            'forum' => 'required|max:255',
            'name' => 'required|max:255',
            'content' => 'required|min:6'
        ]);

        $topic = Topic::create([
            'user_id' => Auth::user()->id,
            'forum_id' => $request->input('forum'),
            'name' => $request->input('name'),
            'content' => $request->input('content')
        ]);

        $topic->forum->setNewestTopic($topic)->save();

        return Redirect::to($topic->getUrl());
    }

    public function updateForm($id)
    {
        $topic = Topic::findOrFail($id);
        if($topic->canEdit() == false)
            return Redirect::to($topic->getUrl());
        return view('forum.topic.edit', ['id' => $id, 'topic' => $topic]);
    }

    protected function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'content' => 'required|min:6'
        ]);

        $topic = Topic::findOrFail($request->input('topic'));
        if($topic->canEdit() == false)
            return Redirect::to($topic->getUrl());
        $topic->name = $request->input('name');
        $topic->content = $request->input('content');
        $topic->save();

        return Redirect::to($topic->getUrl());
    }

    protected function delete($id)
    {
        $topic = Topic::findOrFail($id);
        if($topic->canEdit() == false)
            return Redirect::to($topic->getUrl());
        $url = $topic->forum->getUrl();
        $topic->delete();
        return Redirect::to($url);
    }
}
