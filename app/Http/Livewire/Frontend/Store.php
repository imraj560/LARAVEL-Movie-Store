<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Movies;
use Livewire\Component;

class Store extends Component
{
    public function render()
    {
        $movies = Movies::all();
        return view('livewire.frontend.store',['movies'=>$movies]);
    }
}
