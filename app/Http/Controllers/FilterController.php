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
use App\QuestionComment;
use DB;
use Carbon;
class FilterController extends Controller
{
     public function most_view()
     {
         $all_questions_tag=DB::table('question_tag')->get();
        $question =Question::orderBy('total_view','desc')->paginate(15);
        $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_justify = "most_view";
 $total_jobs=DB::table('jobs')->orderBy('id','desc')->limit(3)->get();
if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withGroup($group)->withTotal_jobs($total_jobs)
                    ->withQuestion_justify($question_justify);
}
else{
 
        return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)->withTotal_jobs($total_jobs)
                    ->withArticle($article)->withAll_questions_tag($all_questions_tag)
                    ->withQuestion_justify($question_justify);
                    ;
}
     
   
    }

public function most_discuss()
     {
 $all_questions_tag=DB::table('question_tag')->get();
        $comment_count = DB::table('question_comments')
    ->select('question_id', DB::raw('count(*) as total'))
    ->groupBy('question_id')
    ->orderBy('total', 'desc')
    ->get();
     $total_jobs=DB::table('jobs')->orderBy('id','desc')->limit(3)->get();
$question =Question::orderBy('id','desc')->paginate(15);
    $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_justify= "most_discuss";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withGroup($group)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);
}
else{
 
        return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withArticle($article)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);;
                    ;
}
     
   
    }

 public function last_week_top()
     {
     $all_questions_tag=DB::table('question_tag')->get();
 $total_jobs=DB::table('jobs')->orderBy('id','desc')->limit(3)->get();
        $date = new Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34
        $date->subDays(7); // or $date->subDays(7),  2014-03-27 13:58:25
        $comment_count = Question::where('created_at', '>', $date->toDateTimeString() )
        ->orderBy('total_view','desc')
        ->get();
       
       $question =Question::orderBy('id','desc')->paginate(15);

        $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_justify = "last week top";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withGroup($group)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);
}
else{
 
        return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withArticle($article)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);
                    ;
}
     
   
    }
 

 public function last_month_top()
     {
     $all_questions_tag=DB::table('question_tag')->get();
 $total_jobs=DB::table('jobs')->orderBy('id','desc')->limit(3)->get();
        $date = new Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34
        $date->subDays(30); // or $date->subDays(7),  2014-03-27 13:58:25
        $comment_count = Question::where('created_at', '>', $date->toDateTimeString() )
        ->orderBy('total_view','desc')
        ->get();
       
       $question =Question::orderBy('id','desc')->paginate(15);

        $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_justify = "last month top";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withGroup($group)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);
}
else{
 
        return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withArticle($article)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);
                    ;
}
     
   
    }   

    public function last_year_top()
     {
     $all_questions_tag=DB::table('question_tag')->get();
 $total_jobs=DB::table('jobs')->orderBy('id','desc')->limit(3)->get();
        $date = new Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34
        $date->subDays(365); // or $date->subDays(7),  2014-03-27 13:58:25
        $comment_count = Question::where('created_at', '>', $date->toDateTimeString() )
        ->orderBy('total_view','desc')
        ->get();
       
       $question =Question::orderBy('id','asc')->paginate(15);

        $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_justify = "last year top";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withGroup($group)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);
}
else{
 
        return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withArticle($article)->withTotal_jobs($total_jobs)
                    ->withComment_count($comment_count)
                    ->withQuestion_justify($question_justify);
                    ;
}
     
   
    } 



public function old_question()
     {
 $all_questions_tag=DB::table('question_tag')->get();
      $total_jobs=DB::table('jobs')->orderBy('id','desc')->limit(3)->get();
$question =Question::orderBy('id','asc')->paginate(15);
    $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
        $question_justify= "old";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withArticle($article)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withGroup($group)->withTotal_jobs($total_jobs)
                    ->withQuestion_justify($question_justify);
}
else{
 
        return view('frontend.pages.index')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withArticle($article)->withTotal_jobs($total_jobs)
                    ->withQuestion_justify($question_justify);;
                    ;
}
     
   
    }  
}
