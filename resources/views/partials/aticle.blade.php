
<div class="form-group">
    <label for="title">Titre de l'article</label>
    <input type="text" id="title" name="title" value="{{ old('title',  isset($article->title) ? $article->title : null) }}" placeholder="Entrez le titre" >
    @error('title')
        <div style="color: red;">{{'Champs obligatoire *'}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="content">Contenu</label>
    <textarea id="content" name="body" rows="5" placeholder="Rédigez le contenu de l'article" >{{ old('body',  isset($article->body) ? $article->body : null) }}</textarea>
    @error('title')
        <div style="color: red;">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="image">Image de l'article</label>
    <input type="file" id="image" name="image" accept="image/*">
    @error('title')
        <div style="color: red;">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <button type="submit">Publier l'Article</button>
</div>
