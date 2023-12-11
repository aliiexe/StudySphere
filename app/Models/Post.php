<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'file_path', 'likes', 'user_id'];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
