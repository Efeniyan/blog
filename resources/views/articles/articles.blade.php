@extends('layouts.master')

@section('title')
Articles
@endsection

@section('content')
<div class="articles-container">
    @if($articles)
    @foreach($articles as $article)
    <div class="article-card">
        @include('partials.article')
    </div>
    @endforeach
    @else
    <div class="no-articles">
        @include('partials.no-articles')

    </div>
    @endif

    <!-- @forelse($articles as $article)
    <div class="article-card">
        @include('partials.article')
    </div>
    @empty
    <div class="no-articles">
        @include('partials.no-articles')

    </div>
    @endforelse
    @endsection -->
</div>