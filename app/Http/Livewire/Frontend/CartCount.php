<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount;

    protected $listeners = ['addCart' => 'checkCartCount'];

    public function checkCartCount(){

        if(Auth::check()){

            return $this->cartCount = Carts::where('user_id', Auth()->user()->id)->count();

        }else{

            return $this->cartCount = 0;
        }

    }

    public function render()
    {
       
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.cart-count',['cartCount' => $this->cartCount]);
    }
}
