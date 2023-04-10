<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    //
    public function add_products(){

      // dd('good');
        $category = Category::all();
      //   dd($category);
        return view('admin.products.add_products', compact('category'));
    }

    public function add_productsdata(Request $request){

      // dd($request->all());

        $rand=rand(111111111,999999999);
        $file = $request->image;
     //    dd($file);
        $fileName = time().rand(100,1000).'.'.$file->extension();  
     //    dd($fileName);

        $file->move(public_path('products'), $fileName);
       
     //    dd($image);
       $product = new Product();
       $product->cate_id = $request->input('cate_id');
       $product->name = $request->input('name');
       $product->slug = $request->input('slug');
       $product->small_description = $request->input('small_description');
       $product->description = $request->input('description');
       $product->original_price = $request->input('original_price');
       $product->selling_price = $request->input('selling_price');
       $product->image =$fileName;
       $product->tax = $request->input('tax');
       $product->qty = $request->input('quantity');
       $product->status = $request->input('status') == TRUE ?'1':'0';
       $product->trending = $request->input('trending') == TRUE ?'1':'0';
       $product->meta_title = $request->input('meta_title');
       $product->meta_description = $request->input('meta_description');
       $product->meta_keywords = $request->input('meta_keywords');
       $product->save();

       return redirect('add_products')->with('status', 'Product Added Successfully');
    }

    public function products(){
      // dd('good');

      $product = Product::all();

      return view('admin.products.products',compact('product'));
    }

    public function deleteproduct(Request $request, $id){
      // dd('good');

      $product = Product::find($id);

      if ($product->image) {
          $path = 'public/products/'. $product->image;
          if (File::exists($path)) {
              File::delete($path);
          }
      }
      $product->delete();

      return redirect('products')->with('status', 'Your Product is Deleted');
    }

    public function update_products($id){
      // dd('good');

      $product = Product::find($id);

      return view('admin.products.updateproducts', compact('product'));
    }

    public function edit_products(Request $request, $id){
      dd('good');

      $product = Product::find($id);

      $rand=rand(111111111,999999999);
      $file = $request->image;
   //    dd($file);
      $fileName = time().rand(100,1000).'.'.$file->extension();  
   //    dd($fileName);

      $file->move(public_path('products'), $fileName);
     
   //    dd($image);
     $product->name = $request->input('name');
     $product->slug = $request->input('slug');
     $product->small_description = $request->input('small_description');
     $product->description = $request->input('description');
     $product->original_price = $request->input('original_price');
     $product->selling_price = $request->input('selling_price');
     $product->image =$fileName;
     $product->tax = $request->input('tax');
     $product->qty = $request->input('quantity');
     $product->status = $request->input('status') == TRUE ?'1':'0';
     $product->trending = $request->input('trending') == TRUE ?'1':'0';
     $product->meta_title = $request->input('meta_title');
     $product->meta_description = $request->input('meta_description');
     $product->meta_keywords = $request->input('meta_keywords');
     $product->update();

     return redirect('updateproducts')->with('status', 'Your Product is Updated Successfully');

    }

}
