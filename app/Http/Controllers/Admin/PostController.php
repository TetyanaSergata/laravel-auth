<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $posts = Post::where('user_id', Auth::id())->get();

      return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $post = Post::all();
      $tags = Tag::all();

      $data = [
        // il primo dato
          'post' => $post,
          'tags' => $tags
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Controlliamo tramite Id se l'utente è autorizzato
      $userAuth = Auth::user()->id;
      $data = $request->all();

      // Nuova Istanza
      $newPost = new Post;
      // Il user_id deve essere uguale a quello autenticato dal controllo
      $newPost->user_id = $userAuth;
      $newPost->title = $data['title'];
      $newPost->body = $data['body'];
      $newPost->slug = Str::finish(Str::slug($newPost->title), rand(1, 1000000));
      $saved = $newPost->save();

      // Se il saved non ci è stato allora torna indietro di un passo, sulla rotta dove stavi appena prima
      if(!$saved) {
            return redirect()->back();
        }

        // Torniamo sulla show
        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($slug)
    // {
    //   $post = Post::where('slug', $slug)->get();
    //
    //   $data = [
    //     // il primo dato
    //     'post' => $post
    //   ];
    //
    //   return view('admin.posts.edit', $data);
    // }

    public function edit(Post $post)
    {
      if (empty($post)) {
        abort('404');
      }

      return view('admin.posts.create', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (empty($post)) {
          abort('404');
        }
      $post->delete();

      return redirect()->route('admin.posts.index');
    }
}
