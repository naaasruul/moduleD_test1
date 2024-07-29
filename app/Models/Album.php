<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Photo;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'status',
        'thumbnail_url',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
