<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();  // Crée un champ 'id' qui sert de clé primaire auto-incrémentée
        $table->string('comment', 255);  // Crée un champ 'comment' de type string avec une longueur maximale de 255 caractères
        $table->foreignId('user_id');  // Crée un champ 'user_id' qui est une clé étrangère pour lier le commentaire à un utilisateur
        $table->foreignId('article_id');  // Crée un champ 'article_id' qui est une clé étrangère pour lier le commentaire à un article
        $table->timestamps();  // Crée les colonnes 'created_at' et 'updated_at' pour suivre la création et la mise à jour du commentaire
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  // Définie une relation étrangère entre 'user_id' et 'id' de la table 'users'. Si un utilisateur est supprimé, tous ses commentaires seront supprimés aussi ('cascade')
        $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');  // Définie une relation étrangère entre 'article_id' et 'id' de la table 'articles'. Si un article est supprimé, tous les commentaires associés seront supprimés aussi ('cascade')
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
