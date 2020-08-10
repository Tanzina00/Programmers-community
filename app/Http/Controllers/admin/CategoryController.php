<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use Session;
use Auth;
class CategoryController extends Controller
{
     
    public function index()
    {

        $allcategories = Category::orderBy('id','desc')->paginate('10');
        return view('admin.category.index')->withAllcategories($allcategories);
    }
 
 
    public function store(Request $request)
    {
          $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->created_by = Auth::user()->name;
        
        $category->save();
        Session::flash('success','CategoryInsert Successfully');
        return redirect()->route('category.index');
    }
 
    public function show($id)
    {
       
    }
 
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit')->withCategory($category);
    }
 
    public function update(Request $request, $id)
    {
         $category = Category::find($id);
         $category->name = $request->name;
         $category->save();
         Session::flash('success','Category Updated Successfully');
         return redirect()->route('category.index');
    }

    
    public function destroy($id)
    {
        $post=Category::find($id);
         //$post->posts()->detach();
         $post->delete();
        session::flash('success','Category Delete has been successfully!');
        return redirect()->route('category.index');
    }
}
