<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Donation;
use App\User;
use App\Category;

class DonationController extends Controller
{

	public function showDonationlist(){
		
     $data['donation'] = Donation::with('user')->get();
    	 
      return view('BackEnd.Donation.donationlist',$data);
	}

	public function showDonationForm(){
		$data['category'] = Category::all();
		// dd($data);
		return view('BackEnd.Donation.donationadd',$data);
	}

    public function donateBook(Request $request){
       // dd($request->all());

   //  	$request->validate([
   //  		'product_name' => 'required|max:50',
   //  		'price' => 'required',
			// 'quantity' => 'required',
   //  		'discount' => 'nullable',
   //  		'description' => 'required',
   //  		'category' => 'required',
   //  		'product_image' => 'required|mimes:jpg,png,jpeg',
   //  	]);
// dd($request);

    	$donate = new Donation();
    
    	$donate->donated_by = \Auth::user()->id;

    	$donate->quantity = $request->quantity;
    	$donate->name = $request->title;
    	
    
    	$donate->category_id = $request->category;
    
// 	//product image upload
		if(($request->image != null)){
            $donate->image = $request->file('image')->store('product','public');
        }
    	$donate->save();


		// foreach($request->other_images as $value){
  //           $product_image = new ProductImage();
  //           $product_image->product_id = $product->id;
		//     $product_image->image =  $value->store('product','public');
		//     $product_image->save();

  //       }

    	\Session::flash('success','Thank You For your Donation');
    	return redirect()->route('donate.list');
    }

}
