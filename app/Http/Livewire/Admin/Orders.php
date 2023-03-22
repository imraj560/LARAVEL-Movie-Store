<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class Orders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $order_id;

    public function closeModal(){

        $this->dispatchBrowserEvent('close-modal');

    }

    public function deleteOrder($order_id){

        $this->order_id = $order_id;
    }

    public function destroyOrder(){

        $orders = Order::findOrFail($this->order_id);

        $orders->delete();

        session()->flash('message','Order Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }



    public function render()
    {
        $orders = Order::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.orders',['orders'=>$orders]);
    }
}
