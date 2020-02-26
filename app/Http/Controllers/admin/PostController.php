<?php
// POSTS PARTE ADMIN
namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    //salva i dati del post
    public function store(Request $request)
    {
        $request->validate([ //dichiaro i valori obbligatori
          'title' => 'required|max:255',
          'author' => 'required|max:100',
          'content' => 'required',
          'img_file' => 'image'
        ]);
        $dati = $request->all(); //recupero i dati del form
        $post = new Post(); //creo un novo oggetto post
        $post->fill($dati); //compilo tutti i dati compilabili in automatico
        if (!empty($dati['img_file'])) { //se l'utente ha impostato un'immagine
          $img = $dati['img_file'];
          $img_path = Storage::put('uploads', $img); //carico l'immagine
          $post->img = $img_path; //assegno la path dell'immagine al post
        }
        $slugOriginale = Str::slug($dati['title']); //recupero il titolo
        $slug = $slugOriginale; //genero lo slug corrispondente
        //per far si che non ci sia uno slug uguale
        $slugUguale = Post::where('slug',$slug)->first();
        $slugTrovati= 1;
        while (!empty($slugUguale)) { //se c'è uno slug uguale
          $slug = $slugOriginale . '-' . $slugTrovati; //aggiungo allo slug un -1
          $slugUguale = Post::where('slug',$slug)->first(); //cerco slug -1
          $slugTrovati++; //e prepara lo slug successivo (cioè -2, poi -3, ecc...)
        }
        $post->slug = $slug; //assegno lo slug
        $post->save(); //salvo il post
        if (!empty($dati['tag_id'])) { //se sono stati selezionati dei tag
          $post->tags()->sync($dati['tag_id']); //li assegno al post
        }
        return redirect()->route('admin.posts.index'); //faccio redirect all'homepage dell'admin
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
        $categories = Category::all();
        $tags = Tag::all();
        $data = ['post' => $post, 'categories' => $categories, 'tags' => $tags];
        return view('admin.posts.edit', $data);
    }

    //salva le modifiche
    public function update(Request $request, Post $post)
    {
        $request->validate([ //dichiaro i valori obbligatori
          'title' => 'required|max:255',
          'author' => 'required|max:100',
          'content' => 'required',
          'img_file' => 'image'
        ]);
        $dati = $request->all(); //recupero il post dal db
        $post->fill($dati);
        if (!empty($dati['img_file'])) { //se c'era già un'immagine di copertina
          $img = $dati['img_file']; //la sostituisco con quella nuova
          $img_path = Storage::put('uploads', $img);
          $post->img = $img_path;
        }
        $post->update($dati); //aggiorno il post
        if (!empty($dati['tag_id'])) {  //se sono stati selezionati dei tag
          $post->tags()->sync($dati['tag_id']); //li assegno al post
        } else { //se non selezioniamo nessun tag
          $post->tags()->sync([]); //togli i tag che ci sono (ovvero, sganciali per poter aggiorna il post con i tag vuoti)
        }
        return redirect()->route('admin.posts.index'); //faccio redirect all'homepage dell'admin
    }

    //cancella un post
    public function destroy(Post $post)
    {
        $post_image = $post->img;
        if (!empty($post_image)) { //se c'è un'immagine associata
          Storage::delete($post_image); //la elimino
        }
        if ($post->tags->isNotEmpty()) { //se la collection non è vuota
          $post->tags()->sync([]); //togli i tag che ci sono (ovvero, sganciali per poter eliminare il post)
        }
        $post->delete(); //elimino il post
        return redirect()->route('admin.posts.index');  //faccio redirect all'homepage dell'admin
    }
}
