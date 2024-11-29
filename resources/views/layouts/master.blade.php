<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LARAVEL @yield('title') </title>
    <style>
        /* Style général de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Style du header */
        header {
            background-color: #f8f4f1;
            /* Beige clair */
            color: #333;
            /* Texte sombre pour le contraste */
            padding: 20px 0;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin: 0;
            color: #5c4033;
            /* Couleur beige foncé */
        }

        /* Style pour la section "About" */
        #about {
            background-color: #ffffff;
            /* Fond blanc */
            padding: 40px 20px;
            max-width: 900px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #about h2 {
            font-size: 2em;
            color: #f8c8a0;
            /* Beige doux */
            text-align: center;
            margin-bottom: 20px;
        }

        #about p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #666;
            /* Gris doux */
        }

        #about p strong {
            color: #f8c8a0;
            /* Beige doux pour les éléments forts */
        }

        /* Style pour la section "Contact" */
        #contact {
            background-color: #ffffff;
            /* Fond blanc */
            padding: 40px 20px;
            max-width: 800px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #contact h2 {
            font-size: 2em;
            color: #f8c8a0;
            /* Beige doux */
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #555;
            /* Gris pour les labels */
        }

        input,
        textarea {
            padding: 10px;
            font-size: 1em;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            /* Gris clair pour les bordures */
            border-radius: 5px;
            width: 100%;
            background-color: #f7f7f7;
            /* Légèrement beige clair */
        }

        button {
            background-color: #f8c8a0;
            /* Beige doux */
            color: white;
            font-size: 1.2em;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e7b687;
            /* Beige un peu plus foncé */
        }

        /* Footer */
        footer {
            text-align: center;
            background-color: #f8f4f1;
            /* Beige clair */
            color: #333;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
        }

        /* Style pour l'article */
        article {
            margin: 50px;
            padding: 20px;
            background-color: #ffffff;
            /* Fond blanc */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Titre de l'article */
        article h1 {
            margin-top: 50px;
            color: #5c4033;
            /* Beige foncé pour les titres */
            font-size: 2em;
            font-weight: bold;
        }

        /* Corps de l'article */
        article p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #666;
            /* Gris doux */
        }

        /* Date et auteur */
        article p small {
            font-size: 0.9em;
            color: #999;
            /* Gris clair pour les petites informations */
        }

        article .author {
            font-weight: bold;
            color: #5c4033;
            /* Beige foncé pour l'auteur */
        }

        /* Bouton de contact */
        a.contact-btn {
            color: #ffffff;
            background-color: #f8c8a0;
            /* Beige doux */
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a.contact-btn:hover {
            background-color: #e7b687;
            /* Beige légèrement plus foncé */
        }



        /* Conteneur d'articles */
        .articles-container {
            margin: 50px auto;
            max-width: 1200px;
            padding: 0 15px;
        }

        .article-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        /* Nom de l'auteur */
        .author-name {
            font-weight: bold;
            color: #333;
            font-size: 1.1em;
        }

        /* Description de l'article */
        .article-description {
            font-size: 1em;
            color: #555;
            margin-top: 10px;
            line-height: 1.6;
        }

        /* Le lien "voir plus" */
        .read-more {
            display: inline-block;
            margin-top: 15px;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .read-more:hover {
            color: #0056b3;
        }

        /* Message quand il n'y a pas d'articles */
        .no-articles {
            text-align: center;
            font-size: 1.2em;
            color: #888;
            margin-top: 50px;
        }

        .master {
            display: flex;
            justify-content: space-around;
        }


        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-container h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('messages.allMessages')
    <h1>Laravel 101</h1>
    <div class="master">
        @guest
        <a href="{{ route('register') }}">Créer un compte</a>
        <a href="{{ route('login') }}">Login</a>
        @endguest
        <a href="/contact-us">Contactez-nous</a>
        <a href="/about">A propos de nous</a>
        <a href="/articles">Articles</a>
        @auth
        <a href="/form">Ajoutez un article</a>
        @endauth
        @auth
        <a href="{{ route('profile') }}">Votre profil</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="Se déconnecter">
        </form>
        @endauth
    </div>

    <div class="container">
        @yield('content')
    </div>
    @yield('cont')
</body>

</html>