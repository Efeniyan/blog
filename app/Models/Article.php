<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // Ajout
    protected $fillable = ['title', 'body', 'user_id', 'image'];

    // Un article n'a qu'un auteur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Un article peut avoir plusieurs commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    
    protected $appends = [
        'author'
    ];
    // !! Le nom de cette méthode n'est pas optionnel !!
    // get 'author' attribute
    // méthode obligatoire pour faire fonctionner notre $appends
    public function getAuthorAttribute()
    {
        return $this->user->name;
    }
}
