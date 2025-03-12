<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'rating', 'rated_by'];

    // A rating belongs to an article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}

