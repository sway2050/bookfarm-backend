<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'description', 'genre', 'image', 'isbn', 'published_on', 'publisher',
    ];

    public static $rules = [
        'title' => 'required|string', 
        'author' => 'required|string', 
        'description' => 'required', 
        'genre' => 'required|string', 
        'image' => 'required', 
        'isbn' => 'required|min:13|max:13', 
        'published_on' => 'required', 
        'publisher' => 'required|string',
    ];
}
