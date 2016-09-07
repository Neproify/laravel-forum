<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show list of your following forums
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum\index', ['forums' => Forum::all()]);
    }

    public function show($id, $name)
    {
        $forum = Forum::findOrFail($id);
        $topics = $forum->topics()->orderBy('updated_at', 'DESC')->paginate(15);
        return view('forum\show', ['forum' => $forum, 'topics' => $topics]);
    }
}
