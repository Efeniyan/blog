<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class ArticlesController extends Controller 
{
    use AuthorizesRequests;
    public function index()
    {
        $articles = Article::with('user')->orderBy('created_at', 'DESC')->get();


        return view('articles.articles', compact('articles'));
    }

    // public function show($id)
    // {
    //     $article = Article::with('user')->where('id', $id)->firstOrFail();
    //     // dd($article);
    //     // ddd($article);
    //     return view('articles.show', compact('article'));
    // }

    // public function show(Article $article)
    // {
    //     return view('articles.show', compact('article'));
    // }

    public function show($id)
    {
        // $article = Article::with('user')->with(['comments' => function ($query) {
        //     $query->with('user');
        // }])->findOrFail($id);

        // dans la méthode show()
        $article = Article::with(['comments' => function ($query) {
            $query->with('user');
        }])->findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function create()
    {
        $this->authorize('create', arguments: Article::class);
        return view('articles.create',);
    }

    public function store(Request $request)
    {
        $this->authorize('create', arguments: Article::class);
        // vérification des permissions plus tard
        // $user = User::find(1);
        $user = auth()->user(); //On récupère l'utilisateur connecté 

        $request['user_id'] = $user->id;

        $validatedData = $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $art = Article::create($validatedData);
        return redirect('/articles')->with(['success_message' => 'L\'article a été crée !']);
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        // dd($article, $request->all());
        $article->update($request->all());
        return redirect('/articles')->with(['success_message' => 'L\'article a été modifiée !']);
    }

    public function delete(Article $article){
        $this->authorize('delete', $article);
        // vérification des permissions plus tard
        $article->delete();
        return redirect('/articles')->with(['success_message' => 'L\'article a été supprimée !']);
    }
}
