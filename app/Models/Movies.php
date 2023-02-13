<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movies extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [

        'genre_id',
        'language_id',
        'name',
        'image',
        'price',
        'status'

    ];

    public function genre(){

        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function language(){

        return $this->belongsTo(Language::class,'language_id','id');
    }

    // public function cart(){

    //     return $this->belongsTo(Carts::class,'movie_id','id');
    // }
}
