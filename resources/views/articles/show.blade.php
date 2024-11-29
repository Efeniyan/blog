@extends('layouts.master')

@section('title')
{{$article->title}}
@endsection

@section('content')

<article>
    <h2>Titre de l'article : {{$article->title}} </h2>
    <p>Contenu de notre article</p>
    <p>{{$article->body}}</p>
    <p>Date d'édition : {{$article->created_at}}</p>
    @if ($article->created_at !== $article->updated_at)
    <p>Date de modification : {{$article->updated_at}}</p>
    @endif
    <p>Auteur : {{$article->user->name}}</p>
    <p>
        <a href="mailto:{{$article->user->email}}">Contacter l'auteur</a>
    </p>
    <a href="/article/{{ $article->id }}/edit">Éditer l'article</a>
    <form action="/article/{{$article->id}}/delete" method="post">
        @csrf 
        @method('DELETE')
        <input type="submit" value="Supprimer l'article">
    </form>

@foreach($article->comments as $comment)
    <p><strong>{{ $comment->user->name }}</strong> a réagi :</p>
    <p>{{ $comment->comment }}</p>
    <p><small>{{ $comment->created_at->diffForHumans() }}</small></p>
@endforeach


</article>

@endsection