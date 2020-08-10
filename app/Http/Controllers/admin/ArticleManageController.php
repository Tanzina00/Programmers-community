<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;
use App\ArticleCategory;
use Session;
use Redirect;
use DB;
use Storage;
use Auth;
class ArticleManageController extends Controller
{
    

public function index($id)
    {
       

       $all_comments = Comment::where('article_id','=',$id)->paginate(10); 
      $current_question = Article::find($id);
       return view('admin.articles.article_with_comments')->withCurrent_question($current_question)
          ->withAll_comments($all_comments);
    }


      public function store(Request $request)
    {
          $this->validate($request, [
            'name' => 'required|max:255|min:3'
        ]);
        $category = new ArticleCategory;
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->save();
        Session::flash('success','Article Category Insert Successfully');
        return Redirect::to('admin/article');
    }




    
    public function article_category_delete($id)
    {
      // echo "category article".$id;
DB::statement('SET FOREIGN_KEY_CHECKS=0;');

 $article_category =ArticleCategory::find($id);
 $current_category = str_slug($article_category->name);
 $post=Article::where('category_id','=',$current_category);
 if ($post != null) {
    $post->delete();
 }
  $comment = Comment::where('category_id','=',$current_category);
 if ($comment != null) {
 $comment->delete();

 }
 $article_category =ArticleCategory::find($id);
 $article_category->delete();
 session::flash('success','Article Category Delete has been successfully!');
 return Redirect::to('admin/article');
}

public function article_comment_delete($id)
    {
 DB::statement('SET FOREIGN_KEY_CHECKS=0;');
  $comment = Comment::find($id);

 if ($comment != null) {
 $comment->delete();

 }
 
 session::flash('success','Comment Delete has been successfully!');
 return Redirect::to("admin/article");

    }

}
