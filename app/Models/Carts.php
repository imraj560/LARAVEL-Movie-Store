<?php

namespace App\Models;

use App\Models\Movies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [

        'user_id',
        'movie_id'

    ];

    public function movies(): BelongsTo {

        return $this->belongsTo(Movies::class, 'movie_id', 'id');
    }
}
