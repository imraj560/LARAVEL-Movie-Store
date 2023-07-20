<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Movies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $orders = Order::count();
        $movies = Movies::count();

        $chart_data_bar = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('count', 'month_name');


        $labels_bar = $chart_data_bar->keys();
        $data_bar = $chart_data_bar->values();


        return view('admin.dashboard',compact('orders','movies','labels_bar','data_bar'));
    }
}
