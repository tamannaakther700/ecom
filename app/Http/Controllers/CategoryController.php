<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function Categorylist(){
         
        return view('backend.category', [
        'data'=> Category::orderBy('id','desc')->simplepaginate(5),
        'cat_count' => Category::count(),

        ]);
    }
    
    function AddCategory(){
         
        return view('backend.add_category');
    }
    function Categorypost(Request $request){
        $request->validate([
            'category_name'=>['required','unique:categories'],
        ],[
            'category_name.required' => 'Dur hala lekos nadu',
            'category_name.unique' => 'Ak leka koybar lekte',
        ]);
        // $cat = new Category;
        // $cat->category_name= $request->cat_name;
        // $cat->save();
        Category::insert([
            'category_name'=> $request->category_name,
            'created_at'=> Carbon::now(),
        ]);

        //return $this->Categorylist();
        //return back()->with('success', 'Category added successfully');
        
        return redirect('admin/category')->with('success', 'Category added successfully');

         
    }
    function CategoryEdit($id){
        return view('backend.category_edit',[
            'category'=> Category::findOrFail($id),
        ]);

    }
    function CategoryUpdate(Request $request){
      //  Category::findOrFail($request->category_id)->update([
      //    'category_name'=> $request->category_name,
      //  'updated_at'=> Carbon::now(),
      //  ]);
        $cat =  Category::findOrFail($request->category_id);
        $cat->category_name= $request->category_name;
        $cat->save();
        return redirect('admin/category');
    }
    function CategoryDelete($id){
        Category::findOrFail($id)->delete();
        return back()->with('delete', 'Category deleted successfully');;
    }

}
