<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

     protected $fillable = ['title', 'author_id', 'isbn', 'published_year', 'description'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user')
                    ->withPivot('borrowed_at', 'returned_at')
                    ->withTimestamps();
    }
}