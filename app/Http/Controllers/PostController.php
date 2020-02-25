<?php
// POSTS PARTE PUBLIC
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

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
    public function postCategoria($slug) {
      $categoria = Category::where('slug', $slug)->first();
      if (!empty($categoria)) {
        $post_categoria = $categoria->posts;
        return view('single-category', ['category' => $categoria,'posts' => $post_categoria]);
      } else {
        return abort(404);
      }
    }
    public function postTag($slug) {
      $tag = Tag::where('slug', $slug)->first();
      if (!empty($tag)) {
        $post_tag = $tag->posts;
        return view('single-tag', ['tag' => $tag,'posts' => $post_tag]);
      } else {
        return abort(404);
      }
    }
}
