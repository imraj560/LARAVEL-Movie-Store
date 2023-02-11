<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Genre;
use App\Models\Movies;
use Livewire\Component;
use App\Models\Language;

class Store extends Component
{

   public $movies, $genreInputs = [], $languageInputs = [];

   protected $queryString = [

    'genreInputs' => ['except' => '', 'as' => 'genre_id'],
    'languageInputs' => ['except' => '', 'as' => 'language_id'],
    // 'priceInput' => ['except' => '', 'as' => 'price'],

    ];


    public function render()
    {
        $this->movies = Movies::when($this->genreInputs, function($q){
            $q->whereIn('genre_id',$this->genreInputs);
        })->when($this->languageInputs, function($q){
            $q->whereIn('language_id',$this->languageInputs);
        })
        ->where('status','0')->get();

        $genres = Genre::all();
        $languages = Language::all();
        return view('livewire.frontend.store',['movies'=>$this->movies,'genres'=>$genres,'languages'=>$languages]);
    }
}
