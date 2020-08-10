<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\GroupPost;
use Auth;
use App\User;
use Session;
use Redirect;
use Purifier;
use DB;
use App\GroupComment;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Response;
class GroupController extends Controller
{
    
    public function create(){

         return view('frontend.pages.group.create_group');
    }
    
    public function save_group(Request $request){

          $group = new Group;
          $group->users_id=Auth::user()->id;
          $group->name = $request->name;
          $group->save();
          $group_id=$group->id;
          DB::table('groups_users')->insert(
                   ['group_id' => $group->id,
                    'users_id' => $group->users_id,
                    'user_role'=> 'admin']);
          return Redirect::to("/groups/{$group_id}");
    }

    public function store(Request $request)
    {
        $group_id = $request->input('group_id');
       $this->validate($request, [
            'body' => 'required|min:120']);
        $post = new GroupPost;
        $post->body = Purifier::clean($request->body);
        $post->user_id=Auth::user()->id;
        $post->group_id=$group_id;
        $post->save();
       session::flash('success','Article Post Successfully Saved');
      return Redirect::to("/groups/{$group_id}");
     }

    public function add_member(Request $request){
       $group_id=$request->group_id;
          DB::table('groups_users')->insert(
                   ['group_id' => $group_id,
                    'users_id' => $request->id,
                    'user_role'=> 'user']);
          return Redirect::to("/groups/{$group_id}");

    }

    public function show($id)
    {  
        $current_group = Group::find($id);
        $groups_post = GroupPost::where('group_id', '=',$current_group->id)->get();
        $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();
         return view('frontend.pages.group.group')
                    ->withGroup($group)->withGroups_post($groups_post)->withCurrent_group($current_group);
}

public function search_group(){
    $term = Input::get('term');
    if (!empty($term)) {
       $results = array();
       $queries = DB::table('groups')->distinct()
        ->where('name', 'LIKE', '%'.$term.'%')
        ->take(5)->get();
    
    foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->name];


    }

return Response::json($results);
    }
    else{

return Redirect::to("/group-search");
    }
   

}


public function group_search(){
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();
    return view('frontend.pages.group.search_group')->withGroup($group);
}

public function search_find(Request $request){
           $name= $request->search_group;
           $find_group = DB::table('groups')
                       ->where('name', '=', $name)
                       ->get();
   if (!$find_group->isEmpty()) {
         $id= $request->id;
         $check_join_group = DB::table('groups_users')
                       ->where('group_id', '=', $id)
                       ->where('users_id','=',Auth::user()->id)
                       ->get();
        $current_group = Group::find($id);
    $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

if (!$check_join_group->isEmpty()) {
     return Redirect::to("/groups/{$id}");
}
else{
    return view('frontend.pages.group.join_group')
           ->withGroup($group)
           ->withCurrent_group($current_group);
}
}
else{
               $group=DB::table('groups_users')
                  ->where('users_id', '=', Auth::user()->id)
                  ->get();
             $search_result = "No Result Match";     
             return view('frontend.pages.group.search_group')
                    ->withGroup($group)
                    ->withSearch_result($search_result);
                  }
}

public function post_details($group_id,$posts_id)
    {

  $posts_comments =GroupComment::where('group_id', '=',$group_id)->where('posts_id', '=',$posts_id)->get();      
     
 $group_post_details = GroupPost::find($posts_id);
 $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();
return view('frontend.pages.group.group_post_details')->withGroup_post_details($group_post_details)->withGroup($group)->withPosts_comments($posts_comments);


  // echo $group_id; $group_post_details
// if (Auth::check()) {
//     $group=DB::table('groups_users')->where('users_id', '=', Auth::user()->id)->get();

// }


// if (!empty($group)) {
//  return view('frontend.pages.group.group_post_details')->withGroup_post_details($group_post_details)->withGroup($group);

// }
// else{
//    return view('frontend.pages.group.group_post_details')->withGroup_post_details($group_post_details);
// }

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
