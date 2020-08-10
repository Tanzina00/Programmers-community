@extends('frontend.master')
@section('title','| The Job')
{{-- @section('top_menu')
        @include('frontend.include.top_menu')
@endsection --}}
@section('asksection')
{!! Html::style('frontend-style/css/job.css') !!}
{!! Html::style('frontend-style/css/details.css') !!}

        @include('frontend.include.the_job')
        @include('frontend.include.job_menu')
@endsection

@section('maincontent')

 <div class="col-md-4 left-sidebar text-left">
               <div class="row title">               
               <div class="col-md-12 ">
              <h3>{{ $jobs->name }}</h3>
              </div>                   
              </div> 
               <div class="row detail">               
               <div class="col-md-12">
              <div class="row table">
                <div class="col-xs-5">
                  <p>Recruiter</p>
                </div>
                <div class="col-xs-7">
                  <p style="color: orange;cursor: pointer; cursor: hand;">{{ $jobs->company_title }}</p>
                </div>
              </div>
                            <div class="row table">
                <div class="col-xs-5">
                  <p>Location</p>
                </div>
                <div class="col-xs-7">
                  <p>{{ $jobs->location}}</p>
                </div>
              </div>
              <div class="row table">
                <div class="col-xs-5">
                  <p>Salary</p>
                </div>
                <div class="col-xs-7">
                  <p>
                   @if ( !empty ($jobs->salary1) )
                         $ {{ $jobs->salary1 }}
                          @else
                         $ {{ $jobs->salary2 }} - 
                          {{ $jobs->salary3 }}
                          
                          @endif
                          {{ $jobs->duration }}


                  </p>
                </div>
              </div>
              <div class="row table">
                <div class="col-xs-5">
                  <p>Posted</p>
                </div>
                <div class="col-xs-7">
                  <p>
                  {{ date('d-M-y',strtotime($jobs->created_at)) }}

                  </p>
                </div>
              </div>
              <div class="row table">
                <div class="col-xs-5">
                  <p>Dedline</p>
                </div>
                <div class="col-xs-7">
                  <p> {{ date('d-M-y',strtotime($jobs->dedline)) }}</p>
                </div>
              </div>
             
              <div class="row table">
                <div class="col-xs-5">
                  <p>Hours</p>
                </div>
                <div class="col-xs-7">
                  <p><a href="">{{ $jobs->jobs_type }}</a></p>
                </div>
              </div>
                  <div class="row table">
                <div class="col-xs-5">
                  <p>Category</p>
                </div>
                <div class="col-xs-7">
                  <p><a href="#">
                  	{{ App\Job_Category::find($jobs->category_id)->name }}
                  </a></p>
                </div>
              </div>
             

              </div>                   
              </div>            
                <!-- end of left sidebar -->
                 </div>
                    <div class="col-md-8  text-left " >
    <div class="row details-job">
               <div class="col-md-12  job-content">
               <div class="row">
  <div class="col-md-12 job-btns">
  <ol class="breadcrumb navbar-right">
      
        <li class="send"> 
            <a href="" class="btn">
            <i class="fa fa-envelope" aria-hidden="true"></i>
  Send
  </a>
  </li>     
  <li class="save-btn">
  <a href="" class="btn">
  <i class="fa fa-envelope" aria-hidden="true"></i>        
   Save
    </a>    
  </li>
      

      <li class="apply">        
   <a class="btn btn-md btn-primary" href="{{ url('/jobs-apply',$jobs->id) }}" >Apply  </a> 
      </li>
    </ol>
  
  </div>
</div>
    <div class=" job">
    <p style="font-size:15px !important">
    {!! $jobs->description !!}
   </p>

<h4>Academic Qualification</h4>
{!! $jobs->qualification !!}

  <h4>Main Responsibilities & Activities</h4>
  {!! $jobs->activities !!}


  <h4>Skills and Experience - essential</h4>
  {!! $jobs->skill !!}


  <h4>Benefits </h4>
  {!! $jobs->binefits !!}

  <p>
  To apply please send your CV and cover letter (max. 500 words) via the button below by midnight on Sunday 5th February 2017.       
  </p>   
 {{--  <p class="attach">
  Attached file:<br>
  <a href="uploads/doc.pdf"><i class="fa fa-file-text" aria-hidden="true"></i> Business Development Manager</a>      
  </p>   --}}                    
  </div>
  </div>
  </div>
        
   <a class="btn btn-primary btn-md" href="{{url('/jobs-apply',$jobs->id)}}">Apply Now </a> 
                      </div>  


@endsection