<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $paidAmount, $carts;


    public function calculatePaidAmount(){

        $this->carts = Carts::where('user_id',Auth::user()->id)->get();
        $this->paidAmount = 0;
        foreach($this->carts as $cart){

            $this -> paidAmount += $cart->movies->price;

        }

        return $this->paidAmount;
    }


    public function render()
    {
        $this->paidAmount = $this->calculatePaidAmount();
        return view('livewire.frontend.checkout',['paidAmount' => $this->paidAmount]);
    }
}
