<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Carts;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{

    public function render()
    {
        $carts = Carts::where('user_id',Auth::user()->id)->get();
        return view('livewire.frontend.cart',['carts' => $carts]);
    }
}
