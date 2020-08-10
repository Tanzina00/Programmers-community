<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Article;
use Session;
use App\Comment;
use App\User;
use Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request, $slug)
    {

      if (!Auth::check()) {
       $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email'=> 'required|max:255|min:5',
            'comment'=> 'required|max:3000|min:5'
        ]);
       $article = Article::where('slug','=',$slug)->first();
         $comment = new Comment();
         $comment->name=$request->name;
         $comment->email=$request->email;
         $comment->comment=$request->comment;
         $comment->category_id=$request->category_id;
         $comment->approved = true;
         $comment->Article()->associate($article);
         $comment->save();
  Session::flash('success','Comment was Added Successfully');
          return Redirect::to("/article_show/{$article->slug}");

        }
  else{
        $this->validate($request, [
            
            'comment'=> 'required|max:2000|min:5'
        ]);
      
  $article = Article::where('slug','=',$slug)->first();

         $comment = new Comment();
         $comment->name=Auth::user()->name;
         $comment->email=Auth::user()->email;
         $comment->comment=$request->comment;
         $comment->category_id=$request->category_id;
         $comment->approved = true;
         $comment->Article()->associate($article);
         $comment->save();
          Session::flash('success','Comment was Added Successfully');
          return Redirect::to("/article_show/{$article->slug}");
  }
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
