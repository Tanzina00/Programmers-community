<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use App\Job;
use DB;
use App\Job_Category;
use Auth;
use Redirect;
class JobController extends Controller
{
    
    public function index()
    {
        
          $allcategories = Job_Category::orderBy('id','desc')->paginate('10');
          $alljob = Job::All();
          $alluser = User::All();
          return view('admin.job.job_category')
          ->withAllcategories($allcategories)
          ->withAlljob($alljob)
          ->withAlluser($alluser);
    }

    public function show($id)
    {
        $current_categories = Job_Category::find($id);
        $current_category=$current_categories->name;
        $alluser = User::all();
        $alljob = Job::where('category_id','=',$id)->paginate(10);
        return view('admin.job.all_jobs')->withAlluser($alluser)
        ->withAlljob($alljob)->withCurrent_category($current_category);

    }

    public function job_category_create(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|min:5|unique:job_categories'
            
        ]);

        $job_category =new Job_Category;
        $job_category->name = $request->name;
        $job_category->created_by = Auth::user()->name;
        $job_category->save();
        return Redirect::to('admin/jobs');
    }

public function create()
    {          
  $location = DB::table('locations')->orderBy('name')->distinct()->get();
  $job_categories = DB::table('job_categories')->orderBy('name')->distinct()->get();
  $group=DB::table('groups')->where('users_id', '=', Auth::user()->id)->get();
  return view('admin.job.post_job')
         ->withGroup($group)
         ->withlocation($location)
         ->withJob_categories($job_categories);

    }

   


    public function job_category_delete($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $job = Job::where('category_id','=',$id);
        if ($job != null) {
         $job->delete();
        }
        $job_category=Job_Category::find($id);
        if ($job_category != null) {
          $job_category->delete();
        }

$save_jobs = DB::table('save_jobs')->where('category_id','=',$id);
if ($save_jobs != null) {
 $save_jobs->delete();
}
         session::flash('success','Job Category Delete has been successfully!');
  return Redirect::to('admin/jobs');
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      
      $save_jobs = DB::table('save_jobs')->where('jobs_id','=',$id);
      if ($save_jobs != null) {
           $save_jobs->delete();
         }
      $job = Job::find($id);
       
        if ($job != null) {
          $job->delete();

        }
         session::flash('success','Job post Delete has been successfully!');
  return Redirect::to('admin/jobs');
    }
}
