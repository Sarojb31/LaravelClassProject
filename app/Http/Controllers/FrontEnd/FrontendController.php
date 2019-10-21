<?php

namespace App\Http\Controllers\FrontEnd;

use App\Product;
use App\Category;
use App\User;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
   
     public function shop()
    {
       return view('FrontEnd.shop');
    }
     public function about()
    {
       return view('FrontEnd.about');
    }
     public function contact()
    {
       return view('FrontEnd.contact');
    }




     public function cart()
    {


      $data['order']=Order::where('ordered_by',Auth::user()->id)->get();
      
     
      
      return view('FrontEnd.cart',$data);
    }





     public function visit()
    {
       return view('FrontEnd.final');
    }
      public function product(Request $request)
    {
        
         $data['product']=Product::find($request->id);

       
       return view('FrontEnd.product',$data);
    }
   
}
