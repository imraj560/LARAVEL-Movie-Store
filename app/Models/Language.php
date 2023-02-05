<?php

namespace App\Models;

use App\Models\Movies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

     protected $table = 'language';

     protected $fillable = [

        'name',
        'status'

     ];

     public function movies(){

        return $this->hasMany(Movies::class,'language_id','id');
     }
}
