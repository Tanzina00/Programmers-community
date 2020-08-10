<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Article;
use Image;
use Storage;
use App\ArticleCategory;
use App\ArticleTag;
use Session;
use Auth;

use Redirect;
use Purifier;
use App\Group;
use DB;
class ArticleController extends Controller
{
  public function index()
     {
        $article=Article::orderBy('id','desc')->paginate(10);
        $category=ArticleCategory::orderBy('id','desc')->get();
        $article_justify = "normal";
$article_total =Article::all();
if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)
                    ->withArticle_total($article_total)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.article')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withArticle_total($article_total)
                    ->withArticle_justify($article_justify);
}
     
   
    }
 
    public function create()
    {
        $categories=ArticleCategory::all();
      $tags=ArticleTag::all();
      $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();
      return view('frontend.pages.post_articles')->withCategories($categories)->withTags($tags)->withGroup($group);
    }

      public function store(Request $request)
    {
       $this->validate($request, [
            'title' => 'required|min:30|unique:articles',
            'body' => 'required|min:120',
            'category_id'=>'required',
            'featured_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $post = new Article;
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->slug = str_slug($request->title);
        $post->category_id=str_slug(strtolower($request->category_id));
        $post->user_id = Auth::user()->id;

      if ($request->hasFile('article_image')) {
        $image = $request->file('article_image');
        $filename = time().".".$image->getClientOriginalExtension();
        $location = public_path('images/'.$filename);
        Image::make($image)->resize(600,300)->save($location); 
        $post->image="images/".$filename;

      }
        $post->save();
       
       // $post->tags()->sync($request->tags,false);
      session::flash('success','Article Post Successfully Saved');
      return Redirect::to('/article');
      
    
    }

    
    public function show($slug)
    {
         $article = Article::where('slug','=',$slug)->first();
         $article->total_view= $article->total_view + 1;
         $article->save();
if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
if (!empty($group)) {
     return view('frontend.pages.articles_details')->withArticle($article)->withGroup($group);}
else{
  return view('frontend.pages.articles_details')
  ->withArticle($article);
}}
 
 public function show_with_comments($slug)
    {
        $article = Article::where('slug','=',$slug)->first();
       $category_name = $article->category_id;
         if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();}
if (!empty($group)) {
     return view('frontend.pages.articles_details')->withArticle($article)->withGroup($group)->withCategory_name($category_name);}
else{
  return view('frontend.pages.articles_details')->withArticle($article)->withCategory_name($category_name);
}


    }




    public function article_with_categories($name)
     {
       $article_justify = "normal";
$article=Article::where('category_id','=',$name)->orderBy('id','desc')->paginate(10);
  $category=ArticleCategory::orderBy('id','desc')->get();
 $article_total =Article::all();      

if (Auth::check()) {
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

}
    
if (!empty($group)) {
    
    return view('frontend.pages.articles_category')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withGroup($group)
                    ->withName($name)->withArticle_total($article_total)
                    ->withArticle_justify($article_justify);
}
else{
 
        return view('frontend.pages.articles_category')
                    ->withCategory($category)
                    ->withArticle($article)
                    ->withName($name)->withArticle_total($article_total)
                    ->withArticle_justify($article_justify)
                    ;
}
     
   
    }


 public function edit($slug)
     {
        $post=Article::where('slug','=',$slug)->get();
        $categories = ArticleCategory::all();
        $cats =[];
        foreach ($categories as $category) {
          $cats[$category->name]=$category->name;
        }
        return view('frontend.pages.article_edit')->withPost($post)
        ->withCategories($cats);
    }

public function update(Request $request, $slug)
      {
       $post=Article::where('slug','=',$slug)->get();
       if($request->input('title') == $post[0]->title){
           $this->validate($request, [
            'body' => 'required|min:120',
            'category_id'=>'required',
                
            
            ]);
      }
 else {
           $this->validate($request, [
            'title' => 'required|max:150|min:3|unique:questions,title',
            'category_id'=>'required',
            'body' => 'required|min:120',
            
        ]);
      } 
        $article =Article::find($post[0]->id);
        $article->title = $request->title;
        $article->body = Purifier::clean($request->body);
        $article->slug = str_slug($request->title);
        $article->category_id=str_slug(strtolower($request->category_id));
        $article->user_id = Auth::user()->id;

 if ($request->hasFile('featured_image')) {
        $image = $request->file('featured_image');
        $filename = time().".".$image->getClientOriginalExtension();
        $location = public_path('images/'.$filename);
        Image::make($image)->resize(600,300)->save($location); 
        $oldFilename = $article->image;
        $article->image="images/".$filename;
        Storage::delete($oldFilename);

      }

        $article->save();


session::flash('success','Article Post Successfully Saved');
return Redirect::to("/article/{$article->slug}");
    }

    public function destroy($id)
    {
               // echo "category article".$id;
DB::statement('SET FOREIGN_KEY_CHECKS=0;');

 $article_category =ArticleCategory::find($id);
 $current_category = str_slug($article_category->name);
 $post=Article::where('category_id','=',$current_category);
 $post->delete();
 $comment = Comment::where('category_id','=',$current_category);
 $comment->delete();
 // $article_category =ArticleCategory::find($id);
 // $article_category->delete();
 session::flash('success','Blog Delete has been successfully!');
 return Redirect::to('admin/article');

    }
    
}



