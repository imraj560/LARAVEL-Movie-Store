<?php

namespace App\Models;

use App\Models\Movies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderitem extends Model
{
    use HasFactory;

    protected $table = 'orders_items';

    protected $fillable = [

        'order_id',
        'movie_id',
        'price'
    ];

    public function movie():BelongsTo
    {
        return $this->belongsTo(Movies::class, 'movie_id', 'id');
    }

}
