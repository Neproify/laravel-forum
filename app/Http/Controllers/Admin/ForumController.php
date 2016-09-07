<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Forum;
use Redirect;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.forum.index', ['forums' => Forum::all()]);
    }

    public function delete($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->delete();
        return Redirect('/admin/forum');
    }

    public function create()
    {
        $forum = Forum::create([
            'name' => 'Forum'
        ]);
        return Redirect('/admin/forum');
    }

    public function updateForm($id)
    {
        return View('admin.forum.edit', ['forum' => Forum::findOrFail($id)]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'description' => 'min:3|max:255'
        ]);

        $forum = Forum::findOrFail($request->input('forum'));
        $forum->name = $request->input('name');
        $forum->description = $request->input('description');
        $forum->save();

        return Redirect('/admin/forum');
    }
}
