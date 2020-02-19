<?php
// POSTS PARTE ADMIN
namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        $data = ['posts' => $posts];
        return view('admin.posts.index', $data);
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(Request $request)
    {
        $dati = $request->all();
        $post = new Post();
        $post->fill($dati);
        $post->slug = Str::slug($dati['title']);
        $post->save();
        return redirect()->route('admin.posts.index');
    }


    public function show(Post $post)
    {
        $data = ['post' => $post];
        return view('admin.posts.show', $data);
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
