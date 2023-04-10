<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        // dd('good');
        $category = category::all();
        return view('admin.categories.index', compact('category'));
    }

    public function add(){

        return view('admin.categories.add');
    }

    public function add_category(Request $request){
    //    dd(public_path());
        $rand=rand(111111111,999999999);
           $file = $request->image;
        //    dd($file);
           $fileName = time().rand(100,1000).'.'.$file->extension();  
        //    dd($fileName);

           $file->move(public_path('category'), $fileName);
          
        //    dd($image);

        $category = new category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1': '0';
        $category->popular = $request->input('popular') == TRUE ? '1': '0';
        $category->image =$fileName;
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');

        $category->save();
        return redirect('categories')->with('status','Category Added Successfully');
    }

    public function edit($id){
    //    dd('good');

        $data = category::find($id);
    
        return view('admin.categories.edit',compact('data'));
    }


    public function update_cate(Request $request, $id){
        $category = category::find($id);
        if($request->hasfile('image')){
            $path =  'public/category/'. $category->image;
            if(File::exists($path)){
                File::delete($path);
            }

        }
            $rand=rand(111111111,999999999);
            $file = $request->image;
         //    dd($file);
            $fileName = time().rand(100,1000).'.'.$file->extension();  
         //    dd($fileName);
 
            $file->move(public_path('category'), $fileName);

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1': '0';
        $category->popular = $request->input('popular') == TRUE ? '1': '0';
        $category->image =$fileName;
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');

        $category->update();
        return redirect('categories')->with('status', 'Data Updated Successfully');
    }


    public function delete(Request $request,$id){
        // dd('good');
        $category = category::find($id);

        if ($category->image) {
            $path = 'public/category/'. $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', "Your Data and Image Deleted Successfully");
    }
    
}
