<?php

namespace App\Http\Controllers\FrontEnd;

use App\Product;
use App\Category;
use App\Order;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ShopController extends Controller
{
   public function shopList(){
        $data['category']=Category::with('product')->get();

      return view('FrontEnd.shop',$data);
  }
  public function CheckOut(){
        
      return view('FrontEnd.cart',$data);
  }

  public function homrList(){
        $data['category']=Category::with('product')->get();

      return view('FrontEnd.shop',$data);
  }



public function order(Request $request){
  
  $order=new Order();
    
      $order->product_id = $request->product_id;
      $order->quantity = $request->quantity;
      $order->price = $request->price;
       $order->created_at = date('Y-m-d H:i:s');
        $order->updated_at = date('Y-m-d H:i:s');
      $order->ordered_by = Auth::user()->id;

      $order->save();
       
             return redirect()->route('shop');


}	
public function deletecart(Request $request){

  $order = Order::find($request->id);
        // dd($category);
       
        $order->delete();
        \Session::flash('success','Category Deleted Successfully');

        return redirect()->route('cart');
}












//=========================== Upload Books==============================

  public function showuploadForm(){
    $data['category'] = Category::all();
    // dd($data);
    return view('FrontEnd.Product.productform',$data);
  }

  public function uploadBook(Request $request){
       // dd($request->all());

      $request->validate([
        'title' => 'required|max:50',
        'price' => 'required',
      'quantity' => 'required',
        'author' => 'nullable',
        'description' => 'required',
        'category' => 'required',
        'product_image' => 'required|mimes:jpg,png,jpeg',
      ]);

      $product = new Product();
      $product->product_name = $request->title;
      $product->price = $request->price;

      $product->quantity = $request->quantity;
      $product->author = $request->author;
      $product->description = htmlentities($request->description);
      $product->added_by = Auth::user()->name;

      $product->cat_id = $request->category;
    
//       //product image upload
    if(($request->product_image != null)){
            $product->product_image = $request->file('product_image')->store('product','public');
        }

      $product->save();


    // foreach($request->other_images as $value){
  //           $product_image = new ProductImage();
  //           $product_image->product_id = $product->id;
    //     $product_image->image =  $value->store('product','public');
    //     $product_image->save();

  //       }

      \Session::flash('success','Product Added Successfully');
      return redirect()->route('home');
	


}
}

