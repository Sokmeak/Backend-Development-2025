<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id', 'published_at'];

    // An article belongs to one author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // An article has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // An article has many ratings
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}

