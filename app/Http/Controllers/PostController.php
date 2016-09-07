<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Redirect;
use App\Post;
use App\Topic;

class PostController extends Controller
{
    public function createForm($id)
    {
        return view('forum.post.new', ['id' => $id, 'topic' => Topic::findOrFail($id)]);
    }

    public function updateForm($id)
    {
        $post = Post::findOrFail($id);
        if($post->canEdit() == false)
            return Redirect::to($post->topic->getUrl());
        return view('forum.post.edit', ['id' => $id, 'topic' => $post->topic, 'post' => $post]);
    }

    protected function update(Request $request)
    {

        $this->validate($request, [
            'content' => 'required|min:6'
        ]);

        $post = Post::findOrFail($request->input('post'));
        if($post->canEdit() == false)
            return Redirect::to($post->topic->getUrl());
        $post->content = $request->input('content');
        $post->save();

        return Redirect::to($post->topic->getUrl());
    }

    protected function create(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required|max:255',
            'content' => 'required|min:6'
        ]);

        $post = Post::create([
            'topic_id' => $request->input('topic'),
            'user_id' => Auth::user()->id,
            'content' => $request->input('content')
        ]);

        $post->topic->setNewestPost($post)->save();
        $post->topic->forum->setNewestTopic($post->topic)->save();

        return Redirect::to($post->topic->getUrl());
    }

    protected function delete($id)
    {
        $post = Post::findOrFail($id);
        if($post->canEdit() == false)
            return Redirect::to($post->topic->getUrl());
        $url = $post->topic->getUrl();
        $post->delete();
        return Redirect::to($url);
    }
}
