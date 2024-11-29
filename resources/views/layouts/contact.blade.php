@extends('layouts.master')

@section('content')
    <header>
        <h1>Contactez-nous</h1>
    </header>

    <section id="contact">
        <div class="content">
            <h2>Envoyez-nous un message</h2>
            <form action="#" method="POST" id="contact-form">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required placeholder="Votre nom">

                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required placeholder="Votre adresse e-mail">

                <label for="subject">Sujet :</label>
                <input type="text" id="subject" name="subject" required placeholder="Sujet de votre message">

                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="5" required placeholder="Votre message"></textarea>

                <button type="submit">Envoyer</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Mon Petit Ourson - Tous droits réservés</p>
    </footer>
@endsection