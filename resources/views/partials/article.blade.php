<p>{{ $article['user']['name'] }}</p>
<p>{{ $article['title'] }}</p>
<a href="/article/{{$article->id}}">voir plus...</a>
<a href="/article/{{ $article->id }}">
    <p>{{ $article->title }}</p>
</a>
