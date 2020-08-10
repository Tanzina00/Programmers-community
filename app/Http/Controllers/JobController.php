<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use App\Group;
use DB;
use Purifier;
use App\Job;
use Auth;
use Session;
use App\User;
use Redirect;
use App\Http\Requests;
use App\JobApply;
use Illuminate\Support\Facades\Input;
use Response;
use App\Job_Category;
class JobController extends Controller
{
    
    
    public function index()
    {          
               $alljobs=Job::orderBy('id','desc')->paginate(12);
               $job_function= Job_Category::orderBy('name')->get();

if (Auth::check()) {
    $check_save_job = DB::table('save_jobs')
    ->where('user_id','=',Auth::user()->id)
    ->get();
    // dd($check_save_job);
    $group=DB::table('groups')->where('users_id', '=', Auth::user()->id)->get();

      if (!empty($group)) {         

            return view('frontend.pages.job.job')->withGroup($group)->withAlljobs($alljobs)->withJob_function($job_function)->withCheck_save_job($check_save_job);
          }
          else{
return view('frontend.pages.job.job')->withAlljobs($alljobs)->withJob_function($job_function)->withCheck_save_job($check_save_job);
          }

}
else{

return view('frontend.pages.job.job')->withAlljobs($alljobs)->withJob_function($job_function);
}

 

  


    }

   public function job_posts()
    {          
               $location = DB::table('locations')->orderBy('name')->distinct()->get();
               $job_categories = DB::table('job_categories')->orderBy('name')->distinct()->get();
               $group=DB::table('groups')->where('users_id', '=', Auth::user()->id)->get();
               return view('frontend.pages.job.post_job')->withGroup($group)->withlocation($location)->withJob_categories($job_categories);

    }
    
    public function store(Request $request)
    {
    
if (empty($request->salary1) && empty($request->salary2) && empty($request->salary3)){
       $this->validate($request, [
            'salary1'=>'required|integer',
           ]);
    }

elseif(!empty($request->salary1)){
   $this->validate($request, [
            'salary1'=>'required|integer',
           ]);
}

else{
   $this->validate($request, [
            'salary2'=>'required|integer',
            'salary3'=>'required|integer',
           ]);
}



$this->validate($request, [
            'name' => 'required|min:6',
            'company_title' => 'required|min:3',
            'category_id'=>'required|integer',
            'location_name'=>'required',
            'email' => 'required',
            'jobs_type' => 'required',
            'duration'=>'required',
            'qualification' => 'required|min:20',
            'skill' => 'required|min:20',
            'activities'=>'required|min:20',
            'binefits' => 'required|min:20',
            'description' => 'required|min:120',
            'dedline' =>'required'
        ]);
 
        $jobs = new Job;
        $jobs->users_id=Auth::user()->id;
        $jobs->name = $request->name;
        $jobs->company_title = $request->company_title;
        $jobs->category_id= $request->category_id;
        $jobs->location= $request->location_name;
        $jobs->email = $request->email;
        $jobs->jobs_type = $request->jobs_type;
        $jobs->salary1 = $request->salary1;
        $jobs->salary2 = $request->salary2;
        $jobs->salary3 = $request->salary3;
        $jobs->duration = $request->duration;
        $jobs->qualification = Purifier::clean($request->qualification);
        $jobs->skill = Purifier::clean($request->skill);
        $jobs->activities = Purifier::clean($request->activities);
        $jobs->binefits = Purifier::clean($request->binefits);
        $jobs->description = Purifier::clean($request->description);
        $jobs->slug = str_slug($request->title);
        $jobs->dedline = date('Y-m-d', strtotime($request->dedline));
        $jobs->save();
       
       
      session::flash('success','Jobs Post has been Successfully');
      return Redirect::to('/jobs');
      
 }

public function show($id)
    {
      
        $jobs = Job::find($id);
if (!$jobs) {
    return Redirect::to('/jobs');
}

        if (Auth::check()) {
          
       $group=DB::table('groups')->where('users_id', '=', Auth::user()->id)->get();
        }
        if (!empty($group)) {
          return view('frontend.pages.job.job_details')->withJobs($jobs)->withGroup($group);
        }
        else{
          return view('frontend.pages.job.job_details')->withJobs($jobs);
        }
       
    }

    public function job_search(Request $request){
      $job_function= Job_Category::orderBy('name')->get();
               $group=Group::orderBy('id','desc')->get();
      $builder = Job::query();
// $term = Request::all();

if(!empty($request->job_function)){
   $builder->whereIn('category_id',$request->job_function);


}
// if(!empty($request->location)){
//    $builder->orWhereIn('location',$request->location);


// }
if(!empty($request->jobs_type)){
   $builder->orWhereIn('jobs_type',$request->jobs_type);
}
// if(!empty($term['salary'])){
//     $builder->orWhereIn('salary','=',$term['salary']);
// }


$result = $builder->orderBy('id')->get();
if (Auth::check()) {
    $check_save_job = DB::table('save_jobs')
    ->where('user_id','=',Auth::user()->id)
    ->get();
    return view('frontend.pages.job.find_jobs')->withGroup($group)->withResult($result)->withJob_function($job_function)->withCheck_save_job($check_save_job);
 }   

else{
return view('frontend.pages.job.find_jobs')->withGroup($group)->withResult($result)->withJob_function($job_function);
    }
}

  public function jobs_save($id){
    $job_category = Job::find($id)->category_id;
    

 DB::table('save_jobs')->insert(
    [
    'user_id' =>Auth::user()->id,
    'jobs_id'    => $id,
    'category_id' => $job_category
    ]);
return redirect("/jobs");

  }  

public function jobs_unsave($id){
                            if(!empty($id)){
                             DB::table('save_jobs')
                             ->where('user_id','=',Auth::user()->id)
                             ->where('jobs_id','=',$id)
                             ->delete(); 
                            }
return redirect("/jobs");

  }


public function job_search_value()
    {
       return redirect("/jobs");
    }

    public function search_location(){
    $term = Input::get('term');
    // dd($term);
    if (!empty($term)) {
       $results = array();
       $queries = DB::table('locations')
        ->where('name', 'LIKE', '%'.$term.'%')
        ->take(5)->get();
    
    foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->name];


    }

return Response::json($results);
    }
    else{

return Redirect::to("/jobs");
    }
   

}
}