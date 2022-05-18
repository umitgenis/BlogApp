<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($id)
    {
        $user=User::find($id);
        $user_posts=$user->posts()->orderBy('created_at','desc')->paginate(4);
        return view('users.profile',['user'=>$user,'user_posts'=>$user_posts]);
    }
}
