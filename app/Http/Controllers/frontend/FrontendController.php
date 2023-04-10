<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;

class FrontendController extends Controller
{
    public function index()
    {
        // dd('good');

        $featured_products = Product::where('trending','1')->take(4)->get();
        $trending_category = Category::where('popular', '1')->take(4)->get();
       return view('frontend.index', compact('featured_products','trending_category'));
    }

    public function category_products(){
        // dd('good');

        $category_products = Category::where('status','0')->take(10)->get();
        return view('frontend.category_products', compact('category_products'));
    }

    public function view_category($id){
        // dd($id);

        if (Category::where('id', $id)->exists()) {
            $category = Category::where('id',$id)->first();
            $products = Product::where('cate_id',$category->id)->where('status', '0')->get();
            return view('frontend.products.products', compact('category','products'))->with('status', 'These ar your products');
        }
        else {

        return redirect('/')->with('status', "Your Product Doesn't exists");
            
        }
    }

    public function cate($cate_id, $prod_id)
    {
        // dd($prod_id);
        if (Category::where('id', $cate_id)->exists()) {

            if (Product::where('id', $prod_id)->exists()) {

                 $products = Product::where('id', $prod_id)->first();
                 
                 $rating = Rating::where('prod_id', $products->id)->get();

                 $rating_sum = Rating::where('prod_id', $products->id)->sum('star_rated');

                 $review = Review::where('prod_id', $products->id)->get();

                 $user_rating = Rating::where('prod_id', $products->id)->where('user_id', Auth::id())->first();

                 if ($rating->count() > 0) {

                    $rating_value = $rating_sum/$rating->count();
                 }else {
                    $rating_value = 0;
                 }

                 return view('frontend.products.prod_view', compact('products','rating','rating_value','user_rating','review'));
            }
            else {
                return redirect('/')->with('status', 'The Link was broken');
            }
        }
        else {
            return redirect('/')->with('status', 'No such catgory Found');
        }
       
    }

    public function product_list()
    {
        // dd('good');
        $product =Product::select('name')->where('status', '0')->get();
        $data = [];
        foreach ($product as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }

    public function searchproduct(Request $request)
    {
        // dd('good');
        $search_product = $request->product_name;

        if ($search_product != "") 
        {
            $product = Product::where("name","LIKE","%$search_product%")->first();
            
            if ($product) 
            {
                return rdirect('cate'.$product->category->id.'/'.$product->id);
            }
            else 
            {
                return redirect()->back()->with('status', 'No Products Mathc your Search');
            }
        }
        else 
        {
            return redirect()->back();
        }
    }
}
