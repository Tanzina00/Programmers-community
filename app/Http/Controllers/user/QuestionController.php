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
class QuestionController extends Controller
{
    
     public function index()
     {
       $all_questions_tag=DB::table('question_tag')->get();
       // dd($all_questions_tag);
        $question =Question::orderBy('id','desc')->paginate(10);
        $all_questions_tag=DB::table('question_tag')->get();
        $question_total =Question::all();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
if (!empty($group)) {
    return view('frontend.pages.question')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withQuestion_total($question_total)
                    ->withGroup($group);}
else{
 return view('frontend.pages.question')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withAll_questions_tag($all_questions_tag)
                    ->withQuestion($question)
                    ->withQuestion_total($question_total);
              }
          }


public function create()
    {
        $categories=Category::all();
          $tags=Tag::all();
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();
           return view('frontend.pages.ask_question')->withCategories($categories)->withTags($tags)->withGroup($group);
    }
 public function store(Request $request)
    {
//       $dalim =str_slug(strtolower($request->category_id));
// dd($dalim);
       $this->validate($request, [
            'title' => 'required|min:30',
            'body' => 'required|min:120',
            'category_id'=>'required',
            'tags' => 'required',
            'featured_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $question = new Question;
        $question->title = $request->title;
        $question->body = Purifier::clean($request->body);
        $question->slug = str_slug($request->title);
        $question->category_id=str_slug(strtolower($request->category_id));
        $question->created_by = Auth::user()->id;

      if ($request->hasFile('question_image')) {
        $image = $request->file('question_image');
        $filename = time().".".$image->getClientOriginalExtension();
        $location = public_path('images/'.$filename);
        Image::make($image)->resize(600,300)->save($location); 
        $question->image="images/".$filename;

      }
        $question->save();
       $tags = $request->tags;
 if (!empty($tags)) {

  foreach ($tags as $tag) {
    DB::table('question_tag')->insert(
    [
    'question_id' => $question->id,
    'tag_id'      => $tag,
    'category_id' => str_slug($request->category_id)
    ]);}
   
}



       // $question->tags()->sync($request->tags,false);
      session::flash('success','Question Post Successfully Saved');
      return Redirect::to('/question');
    }
public function show($slug)
    {
         $article = Question::where('slug','=',$slug)->first();
         
         $article->total_view= $article->total_view + 1;
         $article->save();
         // dd($article->id);
         $question_tag = DB::table('question_tag')
         ->where('question_id','=',$article->id)->get();
         // dd($question_tag);
         
if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
if (!empty($group)) {
 return view('frontend.pages.question_details')->withArticle($article)->withGroup($group)->withQuestion_tag($question_tag);

}
else{
   return view('frontend.pages.question_details')->withArticle($article)
                ->withQuestion_tag($question_tag);
}
       
         
 }
 
  public function show_with_comments($slug)
    {

        $article = Question::where('slug','=',$slug)->first();
        $question_tag = DB::table('question_tag')
         ->where('question_id','=',$article->id)->get();
       


         if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();}

    if (!empty($group)) {
    return view('frontend.pages.question_details')->withArticle($article)->withGroup($group)->withQuestion_tag($question_tag);

}
else{
      return view('frontend.pages.question_details')->withArticle($article)
      ->withQuestion_tag($question_tag);
}
           
      
         
}




    public function question_with_categories($name)
     {
        
         $question =Question::where('category_id','=',$name)->paginate(10);
         $all_questions_tag=DB::table('question_tag')->get();
        $alltag=Tag::orderBy('id','desc')->get();
        $category=Category::orderBy('id','desc')->get();
     $question_total =Question::all();

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
if (!empty($group)) {
    return view('frontend.pages.question_categories')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withGroup($group)
                    ->withName($name)->withAll_questions_tag($all_questions_tag)
                ->withQuestion_total($question_total);
            }
else{
 return view('frontend.pages.question_categories')->withAlltag($alltag)
                    ->withCategory($category)
                    ->withQuestion($question)
                    ->withName($name)->withAll_questions_tag($all_questions_tag)
                    ->withQuestion_total($question_total);
                }
        }



 public function edit($slug)

    {
        $post=Question::where('slug','=',$slug)->get();
        $pre_tag = DB::table('question_tag')
        ->where('question_id','=',$post[0]->id)->get();
        $categories = Category::all();
        $cats =[];
        foreach ($categories as $category) {
          $cats[$category->name]=$category->name;

        }
        $tags = Tag::all();
        $tags2 =[];
        foreach ($tags as $tag) {
          $tags2[$tag->name]=$tag->name;

        }
        
        return view('frontend.pages.question_edit')->withPost($post)
        ->withCategories($cats)->withPre_tag($pre_tag)
        ->withTags($tags2);
    }



    public function update(Request $request, $slug)
    {
       $post=Question::where('slug','=',$slug)->get();
       if($request->input('title') == $post[0]->title){
           $this->validate($request, [
            'body' => 'required|min:120',
            'category_id'=>'required',
            'tags' => 'required',    
            
            ]);
      }
 else {
           $this->validate($request, [
            'title' => 'required|max:150|min:3|unique:questions,title',
            'category_id'=>'required',
            'tags' => 'required', 
            'body' => 'required|min:120',
            
        ]);
      } 
        $question =Question::find($post[0]->id);
        $question->title = $request->title;
        $question->body = Purifier::clean($request->body);
        $question->slug = str_slug($request->title);
        $question->category_id=str_slug(strtolower($request->category_id));
        $question->created_by = Auth::user()->id;
        $question->save();
if(isset($request->tags)){
  $question->tags()->sync($request->tags);
}
else{
  $question->tags()->sync(array());
}
session::flash('success','Blog Post Successfully Saved');
return Redirect::to("/question/{$question->slug}");
    }
}
