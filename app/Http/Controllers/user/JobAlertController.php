<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job_Category;
use App\Location;
// use Request;
use DB;
use Auth;
use App\JobLevel;
use App\JobAlertLevel;
use App\AlertLevelSalary;
use App\AlertLevelHours;
class JobAlertController extends Controller
{

public function dalim(){

}


	
    public function index(){
 
$alert_jobs_category=DB::table('alert_jobs_category')->where('users_id','=',Auth::user()->id)->get();
$alert_jobs_locations=DB::table('alert_jobs_locations')->where('users_id','=',Auth::user()->id)->get();
$alert_jobs_level=DB::table('alert_jobs_level_save')->where('users_id','=',Auth::user()->id)->get();
$alert_jobs_salary=DB::table('alert_jobs_salary')->where('users_id','=',Auth::user()->id)->get();
$alert_jobs_hour=DB::table('alert_jobs_hour')->where('users_id','=',Auth::user()->id)->get();
       $jobscategory=Job_Category::orderBy('name','asc')->get();
       $jobslocation=Location::orderBy('name','asc')->get();
       $jobslevel=JobLevel::orderBy('id','asc')->get();

return view('frontend.pages.job.job_alert')
    	      ->withJobscategory($jobscategory)
    	      ->withJobslocation($jobslocation)
    	      ->withAlert_jobs_category($alert_jobs_category)
    	      ->withAlert_jobs_locations($alert_jobs_locations)
    	      ->withAlert_jobs_level($alert_jobs_level)
    	      ->withAlert_jobs_salary($alert_jobs_salary)
    	      ->withAlert_jobs_hour($alert_jobs_hour)
    	      ->withJobslevel($jobslevel);
    }
  




  public function store(Request $request)
  {
  	
    // $input = Request::all();

    $jobscategory_id= $request->jobscategory;
    
    $location_id= $request->location;
    $job_level= $request->job_level;
    $salary_range= $request->salary;
    $hours= $request->hours;
    $users_id =Auth::user()->id;

if (!empty($jobscategory_id)) {

	foreach ($jobscategory_id as $jobscategory) {
    DB::table('alert_jobs_category')->insert(
    [
    'jobscategory_id' => $jobscategory,
    'users_id'    => $users_id
    ]);}
    // dd($jobscategory_id);
}
    
if (!empty($location_id)) {

foreach ($location_id as $location) {
    DB::table('alert_jobs_locations')->insert(
    [
    'location_id' => $location,
    'users_id'    => $users_id
    ]);}
}

	$alert_jobs_level_update=DB::table('alert_jobs_level_save')->where('users_id','=',Auth::user()->id)->get();
$count =count($alert_jobs_level_update);

if ($count == 0 && !empty($job_level)) {
	
    foreach ($job_level as $joblevel) {
  $update_job_level =new JobAlertLevel;
  $update_job_level->job_alert_name =$joblevel;
  $update_job_level->users_id=$users_id;
  $update_job_level->save();

    }
    // dd($count);
}
if($count != 0) {
	// dd($count);
$update_job_level =  DB::table('alert_jobs_level_save')->where('users_id','=',$users_id)->delete();

if (!empty($job_level)) {
	foreach ($job_level as $joblevel) {
  $update_job_level = new JobAlertLevel;
  $update_job_level->job_alert_name =$joblevel;
  $update_job_level->users_id=$users_id;
  $update_job_level->save();

    }
}
}



	$alert_jobs_salary_update=DB::table('alert_jobs_salary')->where('users_id','=',Auth::user()->id)->get();
$count_salary =count($alert_jobs_salary_update);

if ($count_salary == 0 && !empty($salary_range)) {
	
    foreach ($salary_range as $joblevel) {
  $update_job_salary =new AlertLevelSalary;
  $update_job_salary->salary_range =$joblevel;
  $update_job_salary->users_id=$users_id;
  $update_job_salary->save();

    }
}
if($count_salary != 0) {
	
$update_job_level =  DB::table('alert_jobs_salary')->where('users_id','=',$users_id)->delete();

if (!empty($salary_range)) {
	foreach ($salary_range as $joblevel) {
  $updateJob_level = new AlertLevelSalary;
  $updateJob_level->salary_range =$joblevel;
  $updateJob_level->users_id=$users_id;
  $updateJob_level->save();

    }
}

}

$alert_jobs_salary_update=DB::table('alert_jobs_salary')->where('users_id','=',Auth::user()->id)->get();
$count_salary =count($alert_jobs_salary_update);

if ($count_salary == 0 && !empty($salary_range)) {
	
    foreach ($salary_range as $joblevel) {
  $update_job_salary =new AlertLevelSalary;
  $update_job_salary->salary_range =$joblevel;
  $update_job_salary->users_id=$users_id;
  $update_job_salary->save();

    }
}
if($count_salary != 0) {
	
$update_job_level =  DB::table('alert_jobs_salary')->where('users_id','=',$users_id)->delete();

if (!empty($salary_range)) {
	foreach ($salary_range as $joblevel) {
  $updateJob_level = new AlertLevelSalary;
  $updateJob_level->salary_range =$joblevel;
  $updateJob_level->users_id=$users_id;
  $updateJob_level->save();

    }
}

}

$alert_jobs_hours_update=DB::table('alert_jobs_hour')->where('users_id','=',Auth::user()->id)->get();
$count_hours =count($alert_jobs_hours_update);

if ($count_hours == 0 && !empty($hours)) {
	
    foreach ($hours as $jobhours) {
  $update_job_hours =new AlertLevelHours;
  $update_job_hours->hours=$jobhours;
  $update_job_hours->users_id=$users_id;
  $update_job_hours->save();

    }
}
if($count_hours != 0) {
	
$update_job_hours =  DB::table('alert_jobs_hour')->where('users_id','=',$users_id)->delete();

if (!empty($hours)) {
	foreach ($hours as $jobhours) {
  $updateJob_hours = new AlertLevelHours;
  $updateJob_hours->hours =$jobhours;
  $updateJob_hours->users_id=$users_id;
  $updateJob_hours->save();

    }
}

}
return redirect('/');

}



}
