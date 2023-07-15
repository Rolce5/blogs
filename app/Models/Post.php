<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'body'
    ];
    public function user(){
        $this->belongsTo(User::class);
    }

    public function comments(){
        $this->hasMany(Comment::class);
    }
}
