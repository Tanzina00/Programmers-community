<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\requests;
use Mail;
use Auth;
use Session;
use Redirect;
use DB;
use App\JobApply;
use App\User;
use App\Job;
class JobApplyController extends Controller
{
   
public function index($id) {
    $current_job = Job::find($id);
    if ($current_job) {
         $find_applies = JobApply::where('jobs_id','=',$id)
                           ->where('user_id','=',Auth::user()->id)->get();
                           if (!$find_applies->isEmpty()) {
                             return Redirect::to('/jobs');
                           }
                   else{
                     return view('frontend.pages.job.jobs_apply')
                                ->withCurrent_job($current_job);
                   }
    }
    else{
       
        return Redirect::to('/jobs');
    }
   
}

   public function store(Request $request,$id){
     $this->validate($request,[
     'email' =>'required|email',
     'subject' => 'min:3',
     'message' =>'min:10',
     'a_file' =>'required|max:10000|mimes:doc,docx,pdf,rtf,txt'
]);
   $data = array(
'email' => $request->email,
'subject' =>$request->subject,
'bodyMessage' => $request->message,
'a_file' =>$request->a_file
     );
Mail::send('frontend.pages.emails.contact', $data,function($message) use ($data)
{
    $message->to($data['email']);
    $message->subject($data['subject']);
    $message->from(Auth::user()->email);
    $message->attach($data['a_file']->getRealPath(), array(
        'as' => 'a_file.' . $data['a_file']->getClientOriginalExtension(), 
        'mime' => $data['a_file']->getMimeType())
    );
});

$apply_job = new JobApply;
$apply_job->jobs_id = $id;
$apply_job->user_id = Auth::user()->id;
$apply_job->save();


session::flash('success',"Congrats! Mail Sent Successfully!");
return Redirect::to('/jobs');

     }  

    
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
