<?php

namespace App\Http\Controllers\user;

// use Illuminate\Http\Request;
use Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Category;
use App\Tag;
use App\Group;
class ProfileController extends Controller
{
    
    public function index()
    {


$saved_job = DB::table('save_jobs')->where('user_id', '=', Auth::user()->id)->take(3)->get();
  $job_categories=DB::table('job_categories')->orderBy('id','desc')->get();
  $total_jobs=DB::table('jobs')->orderBy('id','desc')->get();
        $skill_select=Tag::orderBy('id','desc')->get();
        $edit_profile_data = DB::table('edit_profiles')->where('users_id', '=', Auth::user()->id)->get();
        $edit_users_skill = DB::table('users_skill')->where('user_id', '=', Auth::user()->id)->get();


      $question_featured_update =DB::table('featured_interest_question')->where('users_id', '=', Auth::user()->id)->get(); 
       $article_featured_update =DB::table('featured_interest_articles')->where('users_id', '=', Auth::user()->id)->get();
     $question_categories=DB::table('categories')->orderBy('id','desc')->get();
    $article_categories=DB::table('article_categories')->orderBy('id','desc')->get();
  
  $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();
  $my_community=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->take(5)->get();
 
  $my_question=DB::table('questions')->where('created_by', '=', Auth::user()->id)->orderBy('id', 'desc')->take(3)->get();
    $my_articles=DB::table('articles')->where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->take(3)->get();
      return view('frontend.pages.profile')
      ->withMy_question($my_question)->withGroup($group)
      ->withMy_articles($my_articles)
      ->withMy_community($my_community)
      ->withQuestion_categories($question_categories)
      ->withArticle_categories($article_categories)
      ->withJob_categories($job_categories)
      ->withQuestion_featured_update($question_featured_update)
      ->withArticle_featured_update($article_featured_update)
      ->withSkill_select($skill_select)
      ->withEdit_profile_data($edit_profile_data)
      ->withEdit_users_skill($edit_users_skill)
      ->withSaved_job($saved_job)
      ->withTotal_jobs($total_jobs)
      ;
    }
 


public function question_featured_store(Request $request){

    $input = Request::all();
    $interest_id = isset($input["category_interest"]);
    // dd($interest_id);
     if (!empty($interest_id)) {
    $users_id =Auth::user()->id;
    $interest_id_set = $input["category_interest"];
    foreach ($interest_id_set as $interest) {
    DB::table('featured_interest_question')->insert(
    [
    'interest_id' => $interest,
    'users_id'    => $users_id
    ]
);
}
}
return redirect('/profile');
}
   
public function article_featured_store(Request $request){
    $input = Request::all();
     $interest_id = isset($input["article_interest"]);
     if (!empty($interest_id)) {
        
    $users_id =Auth::user()->id;
  $interest_id_set = $input["article_interest"];
    foreach ($interest_id_set as $interest) {
    DB::table('featured_interest_articles')->insert(
    [
    'interest_id' => $interest,
    'users_id'    => $users_id
    ]
);
}
 }
 return redirect('/profile');
}

    public function question_featured_update(Request $request)
    {
        
          $input = Request::all();
          $interest_id = isset($input["category_interest"]); 
           
          if(!empty($interest_id)){
            $users_id =Auth::user()->id;
          $update_job_level =  DB::table('featured_interest_question')
                             ->where('users_id','=',$users_id)
                             ->delete(); 
        $interest_id_set = $input["category_interest"];                       
           foreach ($interest_id_set as $interest) {
    DB::table('featured_interest_question')->insert(
    [
    'interest_id' => $interest,
    'users_id'    => $users_id
    ]
);
}  
          }
         
return redirect('/profile');
    }

    public function article_featured_update(Request $request)
    {

          $input = Request::all();
         $interest_id = isset($input["article_interest"]); 
   
   
    if (!empty($interest_id)) {
         $users_id =Auth::user()->id;
    $update_job_level =  DB::table('featured_interest_articles')->where('users_id','=',$users_id)->delete();
    $interest_id_set = $input["article_interest"]; 
         foreach ($interest_id_set as $interest) {
    DB::table('featured_interest_articles')->insert(
    [
    'interest_id' => $interest,
    'users_id'    => $users_id
    ]
);
}
    }
  

return redirect('/profile');
    }
}
