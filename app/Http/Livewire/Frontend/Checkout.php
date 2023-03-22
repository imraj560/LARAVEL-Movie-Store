<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Carts;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use App\Mail\InvoiceOrderMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Checkout extends Component
{
    public $paidAmount, $carts, $fullname, $phone, $email, $pincode, $address, $payment_mode = NULL, $payment_id = NULL, $totalProductAmount;

    protected $listeners = [

        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value){

        $this->payment_id = $value;
        $this->payment_mode = "Paid by PayPal";

        $codOrder = $this->placeOrder();

        if($codOrder){

            Carts::where('user_id',auth()->user()->id)->delete();
            session()->flash('message','Order placed Successfully');
            $this->dispatchBrowserEvent('message', [

                'text' => 'Order Successfull',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');

        }else{

            $this->dispatchBrowserEvent('message', [

                'text' => 'Order Failed',
                'type' => 'error',
                'status' => 500
            ]);

        }



    }

    public function validationForAll(){

        $this->validate();

    }


    public function rules(){

        return [

            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',

        ];
    }


    public function placeOrder(){

        $this->validate();



        $order = Order::create([

            'user_id' => auth()->user()->id,
            'tracking_no' => 'my_ecom'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' =>$this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id


        ]);



        foreach ($this->carts as $cartItem) {

            Orderitem::create([

                'order_id' => $order->id,
                'movie_id' => $cartItem->movie_id,
                'price' =>$cartItem->movies->price,


            ]);



        }

        return $order;




    }




    public function codOrder(){

        $this->payment_mode = 'Cash On Del';

        $codOrder = $this->placeOrder();

        if($codOrder){

            Carts::where('user_id',auth()->user()->id)->delete();

            try{

                $order = Order::findorFail($codOrder->id);
                Mail::to("$order->email")->send(new InvoiceOrderMailable($order));

           }catch(\Exception $e){


           }

            session()->flash('message','Order placed Successfully');
            $this->dispatchBrowserEvent('message', [

                'text' => 'Order Successfull',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('/thank-you');


        }else{

            session()->flash('message','Order Failed');
            $this->dispatchBrowserEvent('message', [

                'text' => 'Order Failed',
                'type' => 'success',
                'status' => 200
            ]);



        }







        //return redirect('/thank-you');
    }

    public function calculatePaidAmount(){

        $this->carts = Carts::where('user_id',Auth::user()->id)->get();
        $this->paidAmount = 0;
        foreach($this->carts as $cart){

            $this->paidAmount += $cart->movies->price;

        }

        return $this->paidAmount;
    }


    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->paidAmount = $this->calculatePaidAmount();
        return view('livewire.frontend.checkout',['paidAmount' => $this->paidAmount]);
    }
}
