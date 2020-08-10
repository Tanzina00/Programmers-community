<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\User;
use App\Question;
use App\Tag;
use Session;
use Auth;
use DB;
use Redirect;
use Purifier;
use App\Group;
class TagController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag_id)
    {
        
        //$question =Question::where('category_id','=',$name)->paginate(10);
        $alltags = DB::table('question_tag')->get();
        
        $post_tag = DB::table('question_tag')->where('tag_id','=',$tag_id)->get();
        
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_total =Question::all();

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
if (!empty($group)) {
 return view('frontend.pages.tag_post')->withTag_id($tag_id)
        ->withPost_tag($post_tag)->withAlltags($alltags)
        ->withCategory($category)
        ->withGroup($group)
        ->withQuestion_total($question_total);
}
   else{
     return view('frontend.pages.tag_post')->withTag_id($tag_id)
        ->withPost_tag($post_tag)->withAlltags($alltags)
        ->withCategory($category)
        ->withQuestion_total($question_total);
   }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
