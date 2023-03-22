<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Carts;
use App\Models\Genre;
use App\Models\Movies;
use Livewire\Component;
use App\Models\Language;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class Store extends Component
{

   public $movies, $genreInputs = [], $languageInputs = [], $priceInput, $search;

   protected $queryString = [

    'genreInputs' => ['except' => '', 'as' => 'genre_id'],
    'languageInputs' => ['except' => '', 'as' => 'language_id'],
    'priceInput' => ['except' => '', 'as' => 'price'],

    ];

    public function addCart(int $movie_id){

        if(Carts::where('user_id', Auth::user()->id)->where('movie_id',$movie_id)->exists()){

            $this->dispatchBrowserEvent('message',[

                'text' => 'Exists in Cart',
                'type' => 'danger',
                'status' => 200

               ]);

        }else{

            Carts::create([

                'user_id' => Auth::user()->id,
                'movie_id' => $movie_id

            ]);

            $this->emit('addCart');
            session()->flash('message','Added to Cart');
            $this->dispatchBrowserEvent('message',[

                'text' => 'Added to Cart',
                'type' => 'success',
                'status' => 200

            ]);
        }





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
