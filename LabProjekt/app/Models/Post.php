<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'cím',
        'leirás',
        'image_path',
        'szerző_id',
        'is_publikált',
        'dátum',
    ];

    public function szerző()
    {
        return $this->belongsTo(User::class, 'szerző_id');
    }
}
