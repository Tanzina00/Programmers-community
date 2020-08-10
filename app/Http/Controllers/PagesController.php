<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\User;
use App\Question;
use App\Tag;
use App\Article;
use Session;
use Auth;
use App\Group;
use DB;
class PagesController extends Controller
{
     public function index()
     {
        $all_questions_tag=DB::table('question_tag')->get();
        $question =Question::orderBy('id','desc')->paginate(10);
        $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_justify = "normal";
 $total_jobs=DB::table('jobs')->orderBy('id','desc')->limit(3)->get();
if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withGroup($group)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withQuestion_justify($question_justify)
                    ->withTotal_jobs($total_jobs);
}
else{
 
        return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withQuestion_justify($question_justify)
                    ->withTotal_jobs($total_jobs);
}
     
   
    }



    
}
