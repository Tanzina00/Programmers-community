<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ArticleCategory;
use App\User;
use App\Question;
use App\Article;
use Session;
use Auth;
use App\Group;
use App\Comment;
use DB;
use Carbon;
class ArticleFilterController extends Controller
{
    
      public function most_view()
     {
        $article=Article::orderBy('total_view','desc')->paginate(10);
        $article_total =Article::all();
        $category=ArticleCategory::orderBy('id','desc')->get();
        $article_justify = "most view";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
     

    return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)->withArticle_total($article_total)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)->withArticle_total($article_total)
                    ->withArticle_justify($article_justify);
                    ;
}
     
   
    }

 
 public function most_discuss()
     {

        $comment_count = DB::table('comments')
    ->select('article_id', DB::raw('count(*) as total'))
    ->groupBy('article_id')
    ->orderBy('total', 'desc')
    ->get();
$article =Article::orderBy('id','desc')->paginate(12);
    // $article=Article::orderBy('total_view','desc')->limit(6)->get();
    $article_total =Article::all();
         $category=ArticleCategory::orderBy('id','desc')->get();
        $article_justify= "most discuss";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
     
    return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                    ->withArticle_justify($article_justify);
                    ;
}
     
   
    }

     public function last_week_top()
     {
    
$article_total =Article::all();
        $date = new Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34
        $date->subDays(7); // or $date->subDays(7),  2014-03-27 13:58:25
        $comment_count = Article::where('created_at', '>', $date->toDateTimeString() )
        ->orderBy('total_view','desc')
        ->get();
       
       $article=Article::orderBy('id','desc')->paginate(12);

       // $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $category=ArticleCategory::orderBy('id','desc')->get();
        $article_justify = "last week top";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                     ->withArticle_justify($article_justify);
                    
}
     
   
    }


    public function last_month_top()
     {
    $article_total =Article::all();

        $date = new Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34
        $date->subDays(30); // or $date->subDays(7),  2014-03-27 13:58:25
        $comment_count = Article::where('created_at', '>', $date->toDateTimeString() )
        ->orderBy('total_view','desc')
        ->get();
       
       $article=Article::orderBy('id','desc')->paginate(12);

       // $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $category=ArticleCategory::orderBy('id','desc')->get();
        $article_justify = "last month top";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                     ->withArticle_justify($article_justify);
                    
}
     
   
    }

public function last_year_top()
     {
    
$article_total =Article::all();
        $date = new Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34
        $date->subDays(365); // or $date->subDays(7),  2014-03-27 13:58:25
        $comment_count = Article::where('created_at', '>', $date->toDateTimeString() )
        ->orderBy('total_view','desc')
        ->get();
       
       $article=Article::orderBy('id','desc')->paginate(12);

       // $article=Article::orderBy('total_view','desc')->limit(6)->get();
        $category=ArticleCategory::orderBy('id','desc')->get();
        $article_justify = "last year top";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)->withArticle_total($article_total)
                    ->withComment_count($comment_count)
                     ->withArticle_justify($article_justify);
                    
}
     
   
    }

public function old_articles()
     {

     $article_total =Article::all();
$article =Article::orderBy('id','asc')->paginate(12);
   // $article=Article::orderBy('total_view','desc')->limit(6)->get();
       
        $category=ArticleCategory::orderBy('id','desc')->get();
        $article_justify= "old";

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)->withArticle_total($article_total)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)->withArticle_total($article_total)
                    ->withArticle_justify($article_justify)
                    ;
}
     
   
    } 
}
