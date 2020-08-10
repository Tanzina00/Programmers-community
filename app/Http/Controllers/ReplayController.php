<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Article;
use App\Comment;
use Redirect;
use App\Replay;
class ReplayController extends Controller
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
   public function store(Request $request, $comment_id)
    {
       

          $this->validate($request, [
            'name' => 'required|max:255',
            'email'=> 'required|max:255|min:5',
            'comment'=> 'required|max:2000|min:5'
        ]);
        $comment = Comment::find($comment_id);
        //to collect slug url:
          $article_id=$request->article_id;
          $article=Article::find($article_id);

         $replay = new Replay();
         $replay->name=$request->name;
         $replay->email=$request->email;
         $replay->comment=$request->comment;
         $replay->approved = true;
         $replay->comment()->associate($comment);
         $replay->save();
          Session::flash('success','replay was Added Successfully');
         return Redirect::to("/article_show/{$article->id}");

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
