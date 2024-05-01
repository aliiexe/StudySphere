<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'genre',
        'role',
        'email',
        'password',
        'nom',
        'prenom',
        'date_de_naissance',
        'username',
        'mobile',
        'adresse',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'utilisateur_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'user_id');
    }

    public function getNameAttribute()
    {
        return $this->nom . ' ' . $this->prenom;
    }
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
    }

}
