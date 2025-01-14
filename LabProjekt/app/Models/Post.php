<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',     // A bejegyzés címe
        'description',   // A bejegyzés leírása
        'image_path',    // A kép elérési útja
        'author_id',     // A szerző azonosítója
        'is_published',  // Publikált állapot
        'date',          // A bejegyzés dátuma
    ];

    protected $casts = [
        'date' => 'datetime',
        'is_published' => 'boolean',
    ];
    /**
     * Kapcsolat a szerzővel (users tábla).
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
