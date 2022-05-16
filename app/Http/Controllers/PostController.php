<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function detail($id)
    {
        $detail = Post::find($id);
        $post_comments=$detail->comments()->with('user')->orderBy('created_at','desc')->get();
        return view('post.detail', ['detail' => $detail,'post_comments'=>$post_comments]);

    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:10',
            'content' => 'required|string|min:10',
            'photo' => 'required|image|mimes:jpeg,jpg,bmp,png|min:350|max:2048|dimensions:min_width=800,min_height=800'
        ]);

        $path = $request->file('photo')->store('uploads');

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cover_photo_path = $path;

        $user = Auth::user();
        $post->user_id = $user->id;

        $post->save();

        return redirect()->route('detail', $post->id)->with('status', 'Tebrikler, Blok yazısı oluşturuldu...');

    }

    public function updateView($id)
    {
        $post = Post::find($id);
        return view('post.update', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {

        $user = Auth::user();
        $post = Post::find($id);

        if ($post->user_id == $user->id) {

            $request->validate([
                'title' => 'required|string|max:255|min:10',
                'content' => 'required|string|min:10',
                'photo' => 'image|mimes:jpeg,jpg,bmp,png'
            ]);

            $path = $post->cover_photo_path;
            $uploadFile = $request->file('image');

            if (isset($uploadFile)) {
                $newpath = $request->file('image')->store('uploads');

                if (isset($path)) {
                    Storage::delete($path);
                }

                $path = $newpath;
            }

            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->cover_photo_path = $path;

            $post->save();

            return redirect()->route('detail', $post->id)->with('status', 'İşlem Başarılı... Post Güncellendi');

        } else {
            return redirect()->back()->with('status-err', 'Hata! Günecelleme işlemini yapmak için yetkili değilsiniz...');
        }

    }

    public function delete($id)
    {
        $user = Auth::user();

        $post = Post::find($id);

        if ($post->user_id != $user->id) {
            return redirect('/')->with('satatus-err', 'Hata! Silme işlem için yetkili değilsiniz...');
        }

        $path= $post->cover_photo_path;
        if($path != "")
        {
            Storage::delete($path);
        }

        $post->delete();
        return redirect()->route('profile', $user->id)->with('status', 'İşlem Başarılı. Post Silindi...');

    }

    public function commentCreate(Request $request, $id)
    {
        $request->validate([
            'comment' => 'string|min:10|max:250'
        ]);

        $postComment = new Comment();
        $postComment->comment = $request->input('comment');
        $postComment->post_id = $id;
        $postComment->user_id = Auth::user()->id;

        $postComment->save();

        return redirect()->back()->with('status', 'Başarılı, Yorumunuz oluşturuldu...');

    }
}
