<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Crée la colonne 'id', clé primaire auto-incrémentée
            $table->string('title', 255); // Crée la colonne 'title', un champ de type string, avec une longueur maximale de 255 caractères
            $table->text('body'); // Crée la colonne 'body', un champ de type 'text' pour stocker des contenus plus longs
            $table->string('image'); // Crée la colonne 'image', un champ de type string pour stocker le chemin de l'image
            $table->foreignId('user_id')->nullable(); // Crée la colonne 'user_id', qui est une clé étrangère vers la table 'users', et permet que cette colonne soit vide (nullable)
            $table->timestamps(); // Crée les colonnes 'created_at' et 'updated_at' pour suivre les dates de création et de mise à jour des articles
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL'); // Définit la relation étrangère entre 'user_id' et 'id' de la table 'users', et définit la règle de suppression à 'SET NULL'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
