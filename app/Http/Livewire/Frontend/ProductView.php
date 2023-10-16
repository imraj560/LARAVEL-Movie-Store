<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Movies;
use App\Models\Carts;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ProductView extends Component
{
    public $movies, $latestMovies;

    public function addCart(int $movie_id){

        if(Auth::check()){
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
        }else{

            $this->dispatchBrowserEvent('message',[
    
                'text' => 'Please Log In',
                'type' => 'danger',
                'status' => 200

            ]);
        }
   





    }

    public function mount($id){

        $this->movies = Movies::where('id',$id)->get();
        $this->latestMovies = Movies::latest()->take(4)->get();

    }



    public function render()
    {
        return view('livewire.frontend.product-view');
    }
}
