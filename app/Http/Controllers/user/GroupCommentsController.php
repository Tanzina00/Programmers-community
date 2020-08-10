<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GroupComment;
use Auth;
use App\User;
use Redirect;
use App\Http\Requests;
class GroupCommentsController extends Controller
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
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'email'=> 'required|max:255|min:5',
        //     'comment'=> 'required|max:2000|min:5'
        // ]);

         // $posts = Question::find($posts_id);



         $comment = new GroupComment();
         $comment->name=Auth::user()->name;
         $comment->email=Auth::user()->email;
         $comment->comment=$request->comment;
         $comment->group_id=$request->group_id;
         $comment->posts_id=$request->posts_id;
         $comment->approved = true;
         // $comment->Question()->associate($article);
 // dd($comment);
 // exit();
          
          $comment->save();
          $group_id=$request->group_id;
          $posts_id=$request->posts_id;
          
          return Redirect::to("/post-details/{$group_id}/{$posts_id}");
        
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
