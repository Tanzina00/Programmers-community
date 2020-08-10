<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use App\EditProfile;
use Session;
use Auth;
use DB;
use Redirect;

class editProfileController extends Controller
{
    
     public function edit_profile(Request $request){
    
     $this->validate($request, [
            'bio' => 'required|min:5|max:190',
            'skill_select'=>'required',
            'education'=>'required|max:100|min:5',
            'profession_category' => 'required'
        ]);

$edit_profile = new EditProfile;
$edit_profile->name = $request->name;
$edit_profile->users_id = Auth::user()->id;
$edit_profile->profession_category = $request->profession_category;
$edit_profile->education = $request->education;
$edit_profile->bio = $request->bio;
$edit_profile->save();

$skill_id =$request->skill_select;
foreach ($skill_id as $skills_id) {
    DB::table('users_skill')->insert(
    [
    'skill_id' => $skills_id,
    'user_id'    => Auth::user()->id
    ]);}

 return redirect('/profile');

}

 public function update_profile(Request $request){
    
$users_id = Auth::user()->id;
     $this->validate($request, [
            'bio' => 'required|min:5|max:190',
            
            'education'=>'required|max:100|min:5',
            'profession_category' => 'required'
        ]);
$update_job_level =  DB::table('edit_profiles')
                             ->where('users_id','=',$users_id)
                             ->delete(); 

$edit_profile = new EditProfile;
$edit_profile->name = $request->name;
$edit_profile->users_id = Auth::user()->id;
$edit_profile->profession_category = $request->profession_category;
$edit_profile->education = $request->education;
$edit_profile->bio = $request->bio;
$edit_profile->save();
// dd($edit_profile);


$skilled_id =isset($request->skill_select);
if (!empty($skilled_id)) {
    $skill_id =$request->skill_select;
    DB::table('users_skill')
                             ->where('user_id','=',$users_id)
                             ->delete(); 
    foreach ($skill_id as $skills_id) {
    DB::table('users_skill')->insert(
    [
    'skill_id' => $skills_id,
    'user_id'    => Auth::user()->id
    ]);}
}


 return redirect('/profile');

}
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }
}
