@extends('frontend.master')
@section('title','| The Job')
{{-- @section('top_menu')
        @include('frontend.include.top_menu')
@endsection --}}
@section('asksection')
{!! Html::style('frontend-style/css/job.css') !!}
        @include('frontend.include.the_job')
        @include('frontend.include.job_menu')
@endsection

@section('stylesheet')

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https:/resources/demos/style.css">

  </script>
@endsection
@section('maincontent')

  <div class="col-md-9  text-left " >
                   
@foreach($alljobs as $jobs )
                     
       @if(Auth::check())
       @if($check_save_job->isEmpty())
         <div class="row featured-job">
                     <div class="title text-center"><h3><a>{{ $jobs->company_title }}</a></h3></div>
                      <div class="col-md-9 col-sm-9 col-xs-9 job-content">

                        <div class=" job">
                          <p><span>Role:</span> {{ $jobs->name }}</p>
                          <p><span>Location:</span> {{ 

                             $jobs->location
                                }}</p>
                          <p><span>Salary:</span> 
                           @if ( !empty ($jobs->salary1) )
                         $ {{ $jobs->salary1 }}
                          @else
                         $ {{ $jobs->salary2 }} - 
                          {{ $jobs->salary3 }}
                          
                          @endif
                          {{ $jobs->duration }}
                          </p>
                          
                          <p><span>Jobs Type:</span> {{ $jobs->jobs_type }}</p>
                          <p><span>Category:</span>

                           {{ 
                        $jobs_category = App\Job_Category::find($jobs->category_id)->name
                            }}

                           </p>
                          <a class="btn" href="{{ url('job_details/'.$jobs->id) }}">View Details</a>
                        </div>
                      </div>
                      <div class="save">
                     <a href="{{ url('job-save/'.$jobs->id) }}"> <p> <i class="fa fa-star-o" aria-hidden="true"></i></p>
                         <p>Save</p> </a>
                        </div>
                         <div class="deadline">
                         <p><span>Deadline:</span>{{ $jobs->dedline }}</p>
                        </div>
                       </div>

      

 @else
  <div class="row featured-job">
                     <div class="title text-center"><h3><a>{{ $jobs->company_title }}</a></h3></div>
                      <div class="col-md-9 col-sm-9 col-xs-9 job-content">

                        <div class=" job">
                          <p><span>Roless:</span> {{ $jobs->name }}</p>
                          <p><span>Location:</span> 
                          {{ $jobs->location }}</p>
                          <p><span>Salary:</span> 
                           @if ( !empty ($jobs->salary1) )
                         $ {{ $jobs->salary1 }}
                          @else
                         $ {{ $jobs->salary2 }} - 
                          {{ $jobs->salary3 }}
                          
                          @endif
                          {{ $jobs->duration }}
                          </p>
                          
                          <p><span>Jobs Type:</span> {{ $jobs->jobs_type }}</p>
                          <p><span>Category:</span>

                           {{ 
                        $jobs_category = App\Job_Category::find($jobs->category_id)->name
                            }}

                           </p>
                          <a class="btn" href="{{ url('job_details/'.$jobs->id) }}">View Details</a>
                        </div>
                      </div>
                      <div class="save">
                      <?php $x = 0?>
@foreach($check_save_job as $jobs_save)
                    @if($jobs_save->jobs_id == $jobs->id)
                     <a href="{{ url('job-unsave/'.$jobs->id) }}"> <p> <i class="fa fa-star-o" aria-hidden="true"></i></p>
                         <p>Un Save</p> </a>
                         <?php $x = 1?>
                    @endif

@endforeach
 @if($x !=1)
<a href="{{ url('job-save/'.$jobs->id) }}"> <p> <i class="fa fa-star-o" aria-hidden="true"></i></p>
                         <p>Save</p> </a>
 @endif
                        </div>
                         <div class="deadline">
                         <p><span>Deadline:</span>{{ $jobs->dedline }}</p>
                        </div>
                       </div>

      
       @endif
      @else              
<div class="row featured-job">
                     <div class="title text-center"><h3><a>{{ $jobs->company_title }}</a></h3></div>
                      <div class="col-md-9 col-sm-9 col-xs-9 job-content">

                        <div class=" job">
                          <p><span>Roles:</span> {{ $jobs->name }}</p>
                          <p><span>Location:</span> {{ 

                              $jobs->location
                                }}</p>
                          <p><span>Salary:</span> 
                           @if ( !empty ($jobs->salary1) )
                         $ {{ $jobs->salary1 }}
                          @else
                         $ {{ $jobs->salary2 }} - 
                          {{ $jobs->salary3 }}
                          
                          @endif
                          {{ $jobs->duration }}
                          </p>
                          
                          <p><span>Jobs Type:</span> {{ $jobs->jobs_type }}</p>
                          <p><span>Category:</span>

                           {{ 
                        $jobs_category = App\Job_Category::find($jobs->category_id)->name
                            }}

                           </p>
                          <a class="btn" href="{{ url('job_details/'.$jobs->id) }}">View Details</a>
                        </div>
                      </div>
                      <div class="save">
                     <a href="{{ url('job-save/'.$jobs->id) }}"> <p> <i class="fa fa-star-o" aria-hidden="true"></i></p>
                         <p>Save</p> </a>
                        </div>
                         <div class="deadline">
                         <p><span>Deadline:</span>{{ $jobs->dedline }}</p>
                        </div>
                       </div>
@endif
@endforeach
  <div class="text-center">
  
</div>


                    


                    </div>  




                        
                         <div class="col-md-3 right-sidebar">
                    <div class="row">               
               <div class="col-md-12">
              
  
 
    {!! Form::open(['url' => 'search-job']) !!}
    <div class="sidebar-nav">
  <div class="navbar navbar-default" role="navigation">
    <div class="navbar-collapse ">
    <div class="form-group text-left">
    <label for="keyword">Keywords</label>
    <input type="email" class="form-control" id="keyword" placeholder="e.g. Web Designer">
  </div>
  <div class="form-group text-left">
    <label for="location">Location</label>
    {{-- <input type="email" class="form-control" id="location" placeholder="e.g. Dhaka                                   &#xf041;"> --}}
    <input type="text" class="form-control" name="location" id="search_location"
            >
      
    <input type="hidden" name="id" id="id">
   
  </div>
      <ul class="nav navbar-nav" id="sidenav01">
        
        <li >
          <a  data-toggle="collapse" data-target="#toggle" data-parent="" class="collapsed">
          Job function<span class="caret pull-left"></span>
          </a>
          <div class="collapse" id="toggle" style="height: 0px;">
            <ul class="nav nav-list">

            @foreach($job_function as $job_category)
              <li>
         <div class="checkbox">
    <label>
      <input type="checkbox" name="job_function[]" value="{{ $job_category->id }}">{{$job_category->name}}
    </label>
  </div>
  </li>
     @endforeach         
     </ul>
          </div>
        </li>
        {{-- <li >
          <a data-toggle="collapse" data-target="#toggle2" data-parent="" class="collapsed">
         Job level<span class="caret pull-left"></span>
          </a>
          <div class="collapse" id="toggle2" style="height: 0px;">
            <ul class="nav nav-list">
              <li>
         <div class="checkbox">
    <label>
      <input type="checkbox">Apprenticeship
    </label>
  </div>
  </li>
            
     </ul>
          </div>
        </li> --}}
        <li >
          <a data-toggle="collapse" data-target="#toggle3" data-parent="" class="collapsed">
         Salary<span class="caret pull-left"></span>
          </a>
          <div class="collapse" id="toggle3" style="height: 0px;">
            <ul class="nav nav-list">
              <li>
         <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="0">Up to 10,000Tk
    </label>
  </div>
  </li>
      <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="10000">10,000tk - 20,000tk
    </label>
  </div>
  </li>  
                  <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="20000">20,000tk - 30,000tk
    </label>
  </div>
  </li>     
  <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="30000">30,001tk - 40,000tk
    </label>
  </div>
  </li>   
  <li> <div class="checkbox">
    <label>
      <input type="checkbox" name="salary[]" value="40000">40,001tk - 50,000tk
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
      <input type="checkbox" name="jobs_type[]" value="Part Time">Part Time
    </label>
  </div>
  </li>
                <li> 
      <div class="checkbox">
    <label>
      <input type="checkbox" name="jobs_type[]" value="Full Time">Full Time
    </label>
  </div>
  </li>    

   <li> 
      <div class="checkbox">
    <label>
      <input type="checkbox" name="jobs_type[]" value="Temporary"> Temporary
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
<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
{!! Form::close() !!}



</div>
                   
                   </div>

              
                    <!-- end of categories -->
                      </div> 


@endsection

@section('script')

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
 
 $('input:text').bind({

 });
    $( "#search_location" ).autocomplete({
      minLength:1,
      autoFocus:true,
      source: "{{ URL('search-location') }}",
      select: function(event, ui) {
        $('#id').val(ui.item.id);
        $('#search_location').val(ui.item.value);
}
    });
  });
  </script>
@endsection

