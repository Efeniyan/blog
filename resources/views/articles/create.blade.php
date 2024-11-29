@extends('layouts.master')
@section('title')
Créer un Article</title>
@endsection

@section('content')



<div class="form-container">
    <h2>Créer un Article</h2>
    <form action="articles/create" method="post" enctype="multipart/form-data">
        @csrf
        @include('partials/aticle')
    </form>
</div>
@endsection