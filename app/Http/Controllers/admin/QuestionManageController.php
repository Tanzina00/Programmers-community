<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Question;
use App\QuestionComment;
use App\Tag;
use App\User;
use DB;
use Redirect;
use Session;
class QuestionManageController extends Controller
{
    
    public function index($id)
    {
       

       $all_comments = QuestionComment::where('question_id','=',$id)->paginate(10); 
      $current_question = Question::find($id);
       return view('admin.question.question_with_comments')->withCurrent_question($current_question)
              ->withAll_comments($all_comments);
    }

    public function question_category_delete($id)
    {
      
DB::statement('SET FOREIGN_KEY_CHECKS=0;');

 $question_category =Category::find($id);
 $current_category = str_slug($question_category->name);
 $post=Question::where('category_id','=',$current_category);
 $tags = DB::table('question_tag')->where('category_id','=',$current_category);
 if ($tags != null) {
      $tags->delete();
 }
 if ($post != null) {
    $post->delete();
 }
  $comment = QuestionComment::where('category_id','=',$current_category);
 if ($comment != null) {
 $comment->delete();

 }
 $article_category = Category::find($id);
 $article_category->delete();
 session::flash('success','Question Category Delete has been successfully!');
 return Redirect::to('admin/question');
}


public function question_comment_delete($id)
    {

  DB::statement('SET FOREIGN_KEY_CHECKS=0;');
  $comment = QuestionComment::where('id','=',$id);
  
 if ($comment != null) {
 $comment->delete();

 }
 session::flash('success','Question comment Delete has been successfully!');
 return Redirect::to('admin/question');
}




      public function store(Request $request)
    {
          $this->validate($request, [
            'name' => 'required|max:255|min:3'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->created_by = Auth::user()->name;
        
        $category->save();
        Session::flash('success','Question Category Insert Successfully');
        return Redirect::to('admin/question');
    }



    public function edit($id)
    {
        //
    }

    
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
