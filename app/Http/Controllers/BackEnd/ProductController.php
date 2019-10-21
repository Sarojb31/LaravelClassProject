<?php

namespace App\Http\Controllers\BackEnd;
use App\Product;
use App\Category;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	

    /* Product*/
	public function showProductlist(Request $request){
       // $data = DB::table('product')->paginate(15);
		// $data['product'] = Product::all();
        // $data['Category']=Category::all();
        $data['product'] = Product::with('category')->get();
        // dd($data);
       
        //


                	
      return view('BackEnd.Product.listproduct',$data);
	}
	public function showProductForm(){
		$data['category'] = Category::all();
		// dd($data);
		return view('BackEnd.product.productform',$data);
	}


	 public function addProduct(Request $request){
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
    
// 
    	


    	//product image upload
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
    	return redirect()->route('admin.product');
    }

     public function getEditProduct($id){
        $data['product'] = Product::find($id);
    
        return view('BackEnd.Product.edit-product',$data);
    }

    public function postEditProduct(Request $request){

//        dd($request->all());

        // $request->validate([
        //     'title' => 'required|max:255',
        //     'summary' => 'required',
        //     'status' => 'required',
        //     'category_image' => 'nullable|mimes:jpg,png,jpeg',
        //     'category_id' => 'required|integer',
        // ]);
//        dd($request->all());
//        dd('validated');

        $product =  Product::find($request->product_id);
        $product->product_name = $request->product_name;
        $product->description = $request->summary;
        $product->author = $request->author;

        

       

        if (($request->product_image != null)) {
            Storage::delete('public/'.$product->product_image);
            $path = $request->file('product_image')->store('product', 'public');
            $product->product_image = $path;
        }

        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();

        \Session::flash('success','Book Edited Successfully');
        return redirect()->route('admin.product');
    }

public function deleteProduct(Request $request){

    $product = Product::find($request->id);
    
        
       

        Storage::delete('public/'.$product->product_image);
        $product->delete();
        \Session::flash('success', 'Book Deleted Successfully');

        return redirect()->route('admin.product');
  }
}


	


