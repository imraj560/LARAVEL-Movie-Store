<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        return view ('admin.order.view');
    }

    public function genPdf(int $order_id){

        $order = Order::findorFail($order_id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.order.generate-invoice', $data);

        $todayDate = Carbon::now()->format('m-d-Y');
        return $pdf->download('invoice'.$order->id.' - '.$todayDate.'.pdf');

        



    }
}