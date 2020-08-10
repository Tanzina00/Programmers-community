<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\GroupPost;
use Auth;
use App\GroupComment;
use App\User;
use Session;
use Redirect;
use DB;
class GroupController extends Controller
{
    

  public function index()

    {  
        $alluser =User::all();
        $allgroup_posts = GroupPost::all();
       $allgroup = Group::orderBy('id','desc')->paginate(10);
       return view('admin.group.group')->withAllgroup_posts($allgroup_posts)
       ->withAllgroup($allgroup)->withAlluser($alluser);
    }


public function show_all_posts($id)

    {  
       $alluser =User::all();
       $currentgroup = Group::find($id)->name;
       $currentgroup_id =Group::find($id)->id;
       $allgroup_post_comments = GroupComment::all();
       $allgroup_posts = GroupPost::where('group_id','=',$id)->paginate(10);
       return view('admin.group.allgroup_posts')
       ->withAllgroup_posts($allgroup_posts)->withAllgroup_post_comments($allgroup_post_comments)
       ->withAlluser($alluser)->withCurrentgroup($currentgroup)
       ->withCurrentgroup_id($currentgroup_id);
    }

   public function show_all_post_comments($id)

    {  
       // $alluser =User::all();
       $allgroup_post_comments = GroupComment::where('posts_id','=',$id)->paginate(10);
       return view('admin.group.all_group_post_comments')
       ->withAllgroup_post_comments($allgroup_post_comments)
       ;
    }

   public function show_all_users($id)
    {
        $currentgroup = Group::find($id);
        $alluser = User::all();
        $total_user = DB::table('groups_users')
        ->where('group_id','=',$id)
        ->distinct()
        ->get();
        return view('admin.group.manage_group_users')
                   ->withCurrentgroup($currentgroup)
                   ->withAlluser($alluser)
                   ->withTotal_user($total_user);
    }

  public function all_users()
    {
        $alluser = User::all();
        return view('admin.user.all_user')
                   ->withAlluser($alluser);
    }
    
    
    public function delele_group($id)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      $group_comments = DB::table('group_comments')
                       ->where('group_id','=',$id);
        $group_comments->delete();   

           $group_post = GroupPost::where('group_id','=',$id);
        $group_post->delete(); 

             $group_member = DB::table('groups_users')
                       ->where('group_id','=',$id);
        $group_member->delete();  

        $group=Group::find($id);
         $group->delete();
         
     session::flash('success','Group Delete has been successfully!');
        return Redirect::to('admin/groups');
    }
    
    public function delete_group_posts($id)
    {
      
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $group_post = GroupPost::where('id','=',$id);
        $group_post->delete(); 
 session::flash('success','Group post Delete has been successfully!');
        return Redirect::to('admin/groups');
        
      
    }
    public function delete_group_post_comment($id)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $group_post_comments = GroupComment::where('id','=',$id);
        $group_post_comments->delete(); 
 session::flash('success','Group post comment Delete has been successfully!');
        return Redirect::to('admin/groups');
        
      
    }

    public function remove_group_member($id)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $remove_user = DB::table('groups_users')
                       ->where('users_id','=',$id);
        $remove_user->delete(); 
 session::flash('success','Group mamber has been removed successfully!');
        return Redirect::to('admin/groups');
        
      
    }
}
