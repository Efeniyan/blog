<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // Ajout
    protected $fillable = ['title', 'body', 'user_id', 'image'];

    // Un user n'a qu'un profil
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

