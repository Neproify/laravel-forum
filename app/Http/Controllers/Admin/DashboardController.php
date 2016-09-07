<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Topic;
use App\Post;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.dashboard.index', [
            'users' => User::all()->count(),
            'topics' => Topic::all()->count(),
            'posts' => Post::All()->count()
        ]);
    }
}
