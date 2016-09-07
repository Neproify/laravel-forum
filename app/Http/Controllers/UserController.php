<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
  }

  public function showProfile($id, $name)
  {
    return view('user.profile', ['user' => User::findOrFail($id)]);
  }
}
