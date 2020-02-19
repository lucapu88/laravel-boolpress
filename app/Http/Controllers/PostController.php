<?php
// POSTS PARTE PUBLIC
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
      $posts = Post::all();
      $data = ['posts' => $posts];
      return view('posts', $data);
    }
}
