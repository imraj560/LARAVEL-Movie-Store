<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Movies;

class Cart extends Component
{
    public $cart_id;
    public $totalPrice;

    public function closeModal(){

        $this->dispatchBrowserEvent('close-modal');

    }


    public function deleteCart($cart_id){

        $this->cart_id = $cart_id;


    }

    public function destroyCart(){

        Carts::findOrFail($this->cart_id)->delete();
        $this->dispatchBrowserEvent('close-modal');



    }



    public function render()
    {
        $carts = Carts::where('user_id',Auth::user()->id)->get();
        return view('livewire.frontend.cart',['carts' => $carts]);
    }
}
