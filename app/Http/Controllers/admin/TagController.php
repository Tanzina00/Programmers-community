<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Entrust;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Tag;
use App\User;
use Session;
class TagController extends Controller
{

    public function index()
    {
         $alltags =Tag::orderBy('id','Desc')->paginate(5);
        // dd($alltags);

         return view('admin.tag.index')->withAlltags($alltags);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
       
  $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $tags = new Tag;
        $tags->name = $request->name;
        $tags->created_by = Auth::user()->name;
        //dd($tags);
        $tags->save();
        Session::flash('success','Tag Insert Successfully');
        return redirect()->route('tag.index');

    }


    public function show($id)
    {
        //
    }

    

    public function edit($id)
    {
        $tag=Tag::find($id);
        return view('admin.tag.edit')->withTag($tag);
    }


    public function update(Request $request, $id)
    {
         $tag = Tag::find($id);
         $tag->name = $request->name;
         $tag->save();
         Session::flash('success','Tag Updated Successfully');
         return redirect()->route('tag.index');
    }


    public function destroy($id)
    {
          $post=Tag::find($id);
         //$post->posts()->detach();
         $post->delete();
        session::flash('success','Blog Delete has been successfully!');
        return redirect()->route('tag.index');
    }
}
