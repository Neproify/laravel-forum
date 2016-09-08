<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\User;

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
        return view('forum.index', ['forums' => Forum::all(), 'activeUsers' => User::where('last_active', '>', date('Y-m-d H:i:s', time() - 15 * 60))->get()]);
    }

    public function show($id, $name)
    {
        $forum = Forum::findOrFail($id);
        $topics = $forum->topics()->orderBy('updated_at', 'DESC')->paginate(15);
        return view('forum.show', ['forum' => $forum, 'topics' => $topics]);
    }
}
