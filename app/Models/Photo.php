<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
use App\Models\User;
class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'album_id',
        'status'
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class);
    }
}
