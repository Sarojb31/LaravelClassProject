<?php

namespace App\Http\Controllers\BackEnd;


use App\Product;
use App\Order;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{

	public function orderlist(){

$data['order']=Order::all();
dd($data);

return view('BackEnd.Order.order',$data);
}
}
