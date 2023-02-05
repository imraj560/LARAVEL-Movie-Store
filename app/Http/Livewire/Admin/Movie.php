<?php

namespace App\Http\Livewire\Admin;

use App\Models\Movies;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Movie extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $movie_id;

    public function closeModal(){

        $this->dispatchBrowserEvent('close-modal');

    }

    public function deleteMovie($movie_id){

        $this->movie_id = $movie_id;
    }

    public function destroyMovie(){
        $movies = Movies::findOrFail($this->movie_id);
        $destination = $movies->image;

        if(File::exists($destination)){

            File::delete($destination);

        }

        $movies->delete();

        session()->flash('message','Movie Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $movies = Movies::orderBy('id','DESC')->paginate(3);
        return view('livewire.admin.movie.index', ['movies'=>$movies]);
    }
}
