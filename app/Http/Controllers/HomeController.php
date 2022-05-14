<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::select(['id', 'user_id', 'title', 'created_at','cover_photo_path'])->contentSummary()->with('user')->orderByDesc('created_at')->paginate(12);
        return view('home.index',['posts'=>$posts]);
    }
}
