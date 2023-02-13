<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Genre;
use App\Models\Movies;
use Livewire\Component;
use App\Models\Language;

class Store extends Component
{

   public $movies, $genreInputs = [], $languageInputs = [], $priceInput, $search;

   protected $queryString = [

    'genreInputs' => ['except' => '', 'as' => 'genre_id'],
    'languageInputs' => ['except' => '', 'as' => 'language_id'],
    'priceInput' => ['except' => '', 'as' => 'price'],

    ];

    public function addCart(int $movie_id){

        dd($movie_id);
    }


    public function render()

    {
        $this->movies = Movies::when($this->genreInputs, function($q){
            $q->whereIn('genre_id',$this->genreInputs);

        })->when($this->languageInputs, function($q){
            $q->whereIn('language_id',$this->languageInputs);

        })->when($this->priceInput, function($q){

            $q->when($this->priceInput == 'high-to-low', function($q2){

                $q2->orderBy('price', 'DESC');

            })->when($this->priceInput == 'low-to-high', function($q2){

                $q2->orderBy('price', 'ASC');
            });
        })->where('name', 'like', '%'.$this->search.'%')
        ->where('status','0')->get();

        $genres = Genre::all();
        $languages = Language::all();
        return view('livewire.frontend.store',['movies'=>$this->movies,'genres'=>$genres,'languages'=>$languages]);

    }
}
