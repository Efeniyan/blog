@extends('layouts.master')

@section('title')
    Éditer l'article {{ $article->title }}
@endsection

@section('content')
    <form action="{{url('article/'.  $article->id  . '/edit')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        @include('partials.aticle')
    </form>
@endsection