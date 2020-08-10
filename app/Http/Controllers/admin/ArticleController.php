<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Tag;
use App\Article;
use App\Comment;
use App\User;
use Session;
use Image;
use DB;
use Purifier;
use Storage;
use Redirect;
use App\ArticleCategory;
class ArticleController extends Controller
{
    
    public function index(){
         $allcategories = ArticleCategory::orderBy('id','desc')->paginate('10');
          $allarticle = Article::All();
          $alluser = User::All();
          return view('admin.articles.article')
          ->withAllcategories($allcategories)
          ->withAllarticle($allarticle)
          ->withAlluser($alluser);

    }

 public function create()
    {   
      $categories=Category::all();
      $tags=Tag::all();
      return view('admin.articles.create')->withCategories($categories)->withTags($tags);
    }

 public function store(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|min:30',
            'body' => 'required|min:120',
            'category_id'=>'required|integer',
            'featured_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $post = new Article;
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->slug = $title = str_slug($request->title);
        $post->category_id=$request->category_id;
        $post->created_by = Auth::user()->name;

      if ($request->hasFile('article_image')) {
        $image = $request->file('article_image');
        $filename = time().".".$image->getClientOriginalExtension();
        $location = public_path('images/'.$filename);
        Image::make($image)->resize(600,300)->save($location); 
        $post->image="images/".$filename;

      }
        $post->save();
       
       $post->tags()->sync($request->tags,false);
      session::flash('success','Article Post Successfully Saved');
      return redirect()->route('category.index',$post->id);
      
    
    }
 
    public function show($id)
    {
        $current_categories = ArticleCategory::find($id);
        $current_category=str_slug(strtolower($current_categories->name));
       $alluser = User::all();
    $allarticle = Article::where('category_id','=',$current_category)->paginate(10);
       $all_comments = Comment::all(); 
       return view('admin.articles.index')->withAlluser($alluser)
       ->withAllarticle($allarticle)->withAll_comments($all_comments);

    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
 DB::statement('SET FOREIGN_KEY_CHECKS=0;');
  $comment = Comment::find($id);

 if ($comment != null) {
 $comment->delete();

 }
 $post=Article::find($id);
 $post->delete();

 
 session::flash('success','Blog Delete has been successfully!');
 return Redirect::to('admin/article');

    }
}
