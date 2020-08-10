@extends('frontend.master')
@section('title','| The Job')
{{-- @section('top_menu')
        @include('frontend.include.top_menu')
@endsection --}}
@section('asksection')
{!! Html::style('frontend-style/css/job.css') !!}
{!! Html::style('frontend-style/css/job-alert.css') !!}
        @include('frontend.include.the_job')
        @include('frontend.include.job_menu')
@endsection
@section('stylesheet')
{!! Html::style('css/select2.min.css') !!}

@endsection
@section('maincontent')


                         <div class="col-md-offset-2 col-md-8 right-sidebar">
                    <div class="row">               
               <div class="col-md-12">

    {{--   <form action="{!!url('/jobs-alert')!!}" method="POST"> --}}

 {!! Form::open(['url' => '/jobs-alert','files'=>true]) !!}

    <div class="sidebar-nav">
  <div class="navbar navbar-default" role="navigation">
    <div class="navbar-collapse ">
    <div class="text-left"><p class="strong">What type of job are you looking for? </p> </div>
       
    <div class="form-group text-left">
    <label for="keyword">Jobs Category</label>
    {{-- <input type="text" class="form-control" id="keyword" placeholder="e.g. Web Designer"> --}}
@if($alert_jobs_category->isEmpty())
    <select  class="form-control select2-multi" name="jobscategory[]" multiple="multiple">

       @foreach($jobscategory as $category)
     <option style="display: block !important;" value="{{$category->id}}"> {{$category->name}} </option>
@endforeach
          </select>
@else

 <select  class="form-control select2-multi" name="jobscategory[]" multiple="multiple">

 @foreach($alert_jobs_category as $category)
 
     <option style="display: block !important;" value="{{$category->jobscategory_id}}"> {{
     	App\Job_Category::find($category->jobscategory_id)->id}} </option>

@endforeach

       @foreach($jobscategory as $category)
     <option style="display: block !important;" value="{{$category->id}}"> {{$category->name}} </option> 
@endforeach


          </select>
@endif
          
  </div>
  <div class=" form-group text-left location">
    <label for="location">Location</label>
    @if($alert_jobs_locations->isEmpty())
    <select  class="form-control select2-multi" name="location[]" multiple="multiple">

       @foreach($jobslocation as $jobcategory)
     <option style="display: block !important;" value="{{$jobcategory->id}}"> {{$jobcategory->name}} 

     </option>
@endforeach
          </select>
@else
<select  class="form-control select2-multi" name="location[]" multiple="multiple">

 @foreach($alert_jobs_locations as $jobcategory)
     <option style="display: block !important;" value="{{$jobcategory->location_id}}"> 
  
{{App\Location::find($jobcategory->location_id)->id}}
     </option>
@endforeach

       @foreach($jobslocation as $jobcategory)
     <option style="display: block !important;" value="{{$jobcategory->id}}"> {{$jobcategory->name}} </option>
@endforeach
          </select>
@endif
  </div>


      <ul class="nav navbar-nav" id="sidenav01">
       
        <li >
          <a data-toggle="collapse" data-target="#toggle2" data-parent="" class="collapsed">
         Job level<span class="caret pull-left"></span>
          </a>
          <div class="collapse" id="toggle2" style="height: 0px;">
            <ul class="nav nav-list">
             
 <li> 
      <div class="checkbox">
      
    <label>
       <input type="checkbox" name="job_level[]" value="Entry level"

@foreach($alert_jobs_level as $joblevel)
@if($joblevel->job_alert_name == "Entry level") checked @endif
@endforeach
>entry Level
    </label>
   </div>
  </li>

   <li> 
      <div class="checkbox">
      
    <label>
       <input type="checkbox" name="job_level[]" value="Graduate"

@foreach($alert_jobs_level as $joblevel)
@if($joblevel->job_alert_name == "Graduate") checked @endif
@endforeach
>Graduate
    </label>
   </div>
  </li>

   <li> 
      <div class="checkbox">
      
    <label>
       <input type="checkbox" name="job_level[]" value="Internship"

@foreach($alert_jobs_level as $joblevel)
@if($joblevel->job_alert_name == "Internship") checked @endif
@endforeach
>Internship
    </label>
   </div>
  </li>

  <li> 
      <div class="checkbox">
      
    <label>
       <input type="checkbox" name="job_level[]" value="Management"

@foreach($alert_jobs_level as $joblevel)
@if($joblevel->job_alert_name == "Management") checked @endif
@endforeach
>Management
    </label>
   </div>
  </li>

   <li> 
      <div class="checkbox">
      
    <label>
       <input type="checkbox" name="job_level[]" value="Senior executive"

@foreach($alert_jobs_level as $joblevel)
@if($joblevel->job_alert_name == "Senior executive") checked @endif
@endforeach
>Senior executive
    </label>
   </div>
{{-- @endforeach --}}

 </ul>
          </div>
        </li>
        <li >
          <a data-toggle="collapse" data-target="#toggle3" data-parent="" class="collapsed">
         Salary<span class="caret pull-left"></span>
          </a>
          <div class="collapse" id="toggle3" style="height: 0px;">
            <ul class="nav nav-list">
              <li>
         <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="range1"
@foreach($alert_jobs_salary as $salaryRange)
@if($salaryRange->salary_range == "range1") checked @endif
@endforeach
      >Up to 20,000tk
    </label>
  </div>
  </li>
                <li> 
      <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="range2"
@foreach($alert_jobs_salary as $salaryRange)
@if($salaryRange->salary_range == "range2") checked @endif
@endforeach

      >20,000tk - 40,000tk
    </label>
  </div>
  </li>
                <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="range3"
@foreach($alert_jobs_salary as $salaryRange)
@if($salaryRange->salary_range == "range3") checked @endif
@endforeach

      >40,000tk - 60,000tk
    </label>
  </div>
  </li>
                <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="range4"
@foreach($alert_jobs_salary as $salaryRange)
@if($salaryRange->salary_range == "range4") checked @endif
@endforeach

      >60,000tk - 80,000tk
    </label>
  </div>
  </li>
                <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="range5"
@foreach($alert_jobs_salary as $salaryRange)
@if($salaryRange->salary_range == "range5") checked @endif
@endforeach


      >80,000tk - 1,00,000tk
    </label>
  </div>
  </li>
              
                  <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="range6"
@foreach($alert_jobs_salary as $salaryRange)
@if($salaryRange->salary_range == "range6") checked @endif
@endforeach
      >Over 100,000tk
    </label>
  </div>
  </li>           
     </ul>
          </div>
        </li> 

               <li >
          <a data-toggle="collapse" data-target="#toggle4" data-parent="" class="collapsed">
         Hours<span class="caret pull-left"></span>
          </a>
          <div class="collapse" id="toggle4" style="height: 0px;">
            <ul class="nav nav-list">
              <li>
         <div class="checkbox">
    <label>
      <input type="checkbox" name="hours[]" value="Part Time"
@foreach($alert_jobs_hour as $salaryhours)
@if($salaryhours->hours == "Part Time") checked @endif
@endforeach

      >Part Time
    </label>
  </div>
  </li>
                <li> 
      <div class="checkbox">
    <label>
      <input type="checkbox" name="hours[]" value="Full Time"
@foreach($alert_jobs_hour as $salaryhours)
@if($salaryhours->hours == "Full Time") checked @endif
@endforeach
      >Full Time
    </label>
  </div>
  </li>   

    <li> 
      <div class="checkbox">
    <label>
      <input type="checkbox" name="hours[]" value="Temporary"
@foreach($alert_jobs_hour as $salaryhours)
@if($salaryhours->hours == "Temporary") checked @endif
@endforeach
      >Contract
    </label>
  </div>
  </li>          
     </ul>
          </div>
        </li>
       
      </ul>
      </div><!--/.nav-collapse --> 
</div>
</div>
<button type="submit" class="btn btn-primary">Alert me jobs like this</button>
</form>

</div>
                   
                   </div>

              
                    <!-- end of categories -->
                      </div>  


@endsection

@section('script')
 <script src="{{ URL::asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
   $('.select2-multi').select2();
</script>
@endsection
