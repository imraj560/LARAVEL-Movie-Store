<?php

namespace App\Models;

use App\Models\Movies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre';

    protected $fillable = [

        'name',
        'status'
    ];

    public function movies(){

        return $this->hasMany(Movies::class, 'genre_id','id');
    }
}
