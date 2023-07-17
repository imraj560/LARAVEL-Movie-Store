<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Movies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

        $orders = Order::count();
        $movies = Movies::count();

        return view('admin.dashboard',compact('orders','movies'));
    }
}
