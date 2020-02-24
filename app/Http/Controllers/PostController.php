<?php
// POSTS PARTE PUBLIC
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {

    // $posts = Post::paginate(/*numero di post per pagina*/); //se si hanno tanti post e si vuol dividere il tutto per pagina
      $posts = Post::all();
      $data = ['posts' => $posts];
      return view('posts', $data);
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $data = ['post' => $post];
        return view('single-post', $data);
    }
}
