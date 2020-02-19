<?php
// POSTS PARTE ADMIN
namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class PostController extends Controller
{
  //visualizza la schermata principale con l'elenco di tutti i post
    public function index()
    {
        $posts = Post::all();
        $data = ['posts' => $posts];
        return view('admin.posts.index', $data);
    }

    //crea un nuovo post
    public function create()
    {
        return view('admin.posts.create');
    }

    //salva i dati del post
    public function store(Request $request)
    {
        $dati = $request->all();
        $post = new Post();
        $post->fill($dati);
        $slugOriginale = Str::slug($dati['title']);
        $slug = $slugOriginale;
        //per far si che non ci sia uno slug uguale
        $slugUguale = Post::where('slug',$slug)->first();
        $slugTrovati= 1;
        while (!empty($slugUguale)) { //se c'è uno slug uguale
          $slug = $slugOriginale . '-' . $slugTrovati; //aggiungo allo slug un -1
          $slugUguale = Post::where('slug',$slug)->first(); //cerco slug -1
          $slugTrovati++; //e prepara lo slug successivo (cioè -2, poi -3, ecc...)
        }
        $post->slug = $slug;
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    //visualizza i dettagli del singolo post
    public function show(Post $post)
    {
        $data = ['post' => $post];
        return view('admin.posts.show', $data);
    }

    //modifica un post
    public function edit(Post $post)
    {
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

    //salva le modifiche
    public function update(Request $request, Post $post)
    {
        $dati = $request->all();
        $post->update($dati);
        return redirect()->route('admin.posts.index');
    }

    //cancella un post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
