<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   	/* Category*/ 
	public function showCategorylist(){
		$data['category']= Category::all() ;
		// $data['category'] = Category::with('user', 'getParentNameById')->get();
		return view('BackEnd.category.list', $data);
	}

	public function showCategoryForm()
    {
        $data['category']= Category::all();
        return view('BackEnd.category.category_form',$data);
    }
	public function addCategory(Request $request){

		 $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'category_image' => 'required|mimes:jpg,png,jpeg',
        ]);

		 $category = new Category();
        $category->category_title = $request->title;
        $category->category_summary = $request->summary;
        $category->added_by = Auth::guard('admin')->user()->name;
        // dd(Auth::user()->id);
         if (($request->category_image != null)) {
            $path = $request->file('category_image')->store('category', 'public');
        }
        $category->category_image = $path;
        $category->created_at = date('Y-m-d H:i:s');
        $category->save();
        return redirect()->route('admin.category',$category);
	}

		// update Category

    public function getEditCategory($id){
        $data['category'] = Category::find($id);
        
        return view('BackEnd.category.edit_category',$data);
    }

    public function postEditCategory(Request $request){

//        dd($request->all());

        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'category_image' => 'nullable|mimes:jpg,png,jpeg',
            'category_id' => 'required|integer',
        ]);
//        dd($request->all());
//        dd('validated');

        $category =  Category::find($request->category_id);
		$category->category_title = $request->title;
        $category->category_summary = $request->summary;

        if (($request->category_image != null)) {
            Storage::delete('public/'.$category->category_image);
            $path = $request->file('category_image')->store('category', 'public');
            $category->category_image = $path;
        }

        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        \Session::flash('success','Category Edited Successfully');
        return redirect()->route('admin.category');
    }
	public function deleteCategory(Request $request){

		$category = Category::find($request->id);
        // dd($category);
        Storage::delete('public/'.$category->category_image);
        $category->delete();
        \Session::flash('success','Category Deleted Successfully');

        return redirect()->route('admin.category');
	}
}
