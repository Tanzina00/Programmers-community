@extends('frontend.master')
@section('title','| name')

@section('top_menu')
        @include('frontend.include.top_menu')
@endsection



@section('maincontent')
{!! Html::style('frontend-style/css/profile.css') !!}
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
   <section class="image-section text-center">
                  <div class="container">
                  <div class="row"> 
                    <div class="col-md-12">
                      <div class="profile-pic">
                        <img src="{!! asset('frontend-style/images/dalim.jpg') !!}" class="">
                      <p class="text-center" style="color: white"> {{ Auth::user()->name }}</p>

                      </div>
                    </div>
                  </div>
                    <div class="row changes">
                    @if(!$edit_profile_data->isEmpty())
                    @foreach($edit_profile_data as $edit_profile_value)
    <p class="text-center" style="color: white; font-size: 18px">
    
<i class="fa fa-quote-left" style="font-size:12px" aria-hidden="true"></i>
{{$edit_profile_value->bio}}
<i class="fa fa-quote-right" style="font-size:12px" aria-hidden="true"></i>

     </p>
     @endforeach
     @endif
                    <div class="col-md-offset-3 col-md-2 col-sm-4 col-xs-4">
                    <a href="#" class="btn " data-toggle="modal" data-target="#profileModal">
                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
 Edit Profile
                      </a>
                      </div>  
                      <div class=" col-md-2 col-sm-4 col-xs-4 " data-toggle="modal" data-target="#prefereneModal">
                      <a href="#" class="btn ">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
  Change preferences
                      </a>
                      </div>
                       <div class="col-md-2 col-sm-4 col-xs-4">
                      <a href="#" class="btn ">
                     <i class="fa fa-bell-o" aria-hidden="true"></i>
Job Alerts
                      </a>
                      </div>
                       <div class="col-md-offset-3">
                      
                      </div>                   
                    </div>
                    <!-- end of row --> 
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="">Edit Profile</h3>
      </div>
      <div class="modal-body">


@if(!$edit_profile_data->isEmpty())

  {!! Form::open(['url' =>'/update-profile','files'=>true,'class'=>"form-horizontal"]) !!}

@foreach($edit_profile_data as $edit_profile_value)

  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" readonly id="name" 
      value="{{ Auth::user()->name }}"
      >
    </div>
  </div>
  <div class="form-group">
    <label for="skill" class="col-sm-2 control-label">Skills:</label>
    <div class="col-sm-10">
     <select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="skill_select[]" multiple="multiple">

     @foreach($skill_select as $skil)
                <option value="{{$skil->id}}">{{$skil->name}}</option>
            @endforeach
          </select>
  @if ($errors->has('skill_select'))
                           
                                    <span class="help-block">
                                        <strong style="color: #a94442">{{ $errors->first('skill_select') }}</strong>
                                    </span>
                                @endif

      </div>
  </div>
  <div class="form-group">
    <label for="education" class="col-sm-2 control-label">Education:</label>
    <div class="col-sm-10">
      <input type="text" value="{{ $edit_profile_value->education }}" class="form-control" id="education" name="education" placeholder="Your education status">

@if ($errors->has('education'))
                           
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
  
  <div class="form-group">
    <label for="bio" class="col-sm-2 control-label">Bio:</label>
    <div class="col-sm-10">
      <input type="text" name="bio"  value="{{ $edit_profile_value->bio }}" class="form-control" id="bio" placeholder="tell a little bit more..">

       @if ($errors->has('bio'))
                           
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
  <div class="form-group">
    <label for="profession" class="col-sm-2 control-label">Profession:</label>
    <div class="col-sm-10">
      <select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="profession_category">

     @foreach($question_categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          @if ($errors->has('profession_category'))
                           
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession_category') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update Profile</button>
    </div>
  </div>
  @endforeach
</form>

@else
{!! Form::open(['url' =>'/edit-profile','files'=>true,'class'=>"form-horizontal"]) !!}


  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" readonly id="name" 
      value="{{ Auth::user()->name }}"
      >
    </div>
  </div>
  <div class="form-group">
    <label for="skill" class="col-sm-2 control-label">Skills:</label>
    <div class="col-sm-10">
     <select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="skill_select[]" multiple="multiple">

     @foreach($skill_select as $skil)
                <option value="{{$skil->id}}">{{$skil->name}}</option>
            @endforeach
          </select>
  @if ($errors->has('skill_select'))
                           
                                    <span class="help-block">
                                        <strong style="color: #a94442">{{ $errors->first('skill_select') }}</strong>
                                    </span>
                                @endif

      </div>
  </div>
  <div class="form-group">
    <label for="education" class="col-sm-2 control-label">Education:</label>
    <div class="col-sm-10 {{ $errors->has('education') ? ' has-error' : '' }}">
      <input type="text" value="{{ old('education') }}" class="form-control" id="education" name="education" placeholder="Your education status">

@if ($errors->has('education'))
                           
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
  
  <div class="form-group">
    <label for="bio" class="col-sm-2 control-label">Bio:</label>
    <div class="col-sm-10 {{ $errors->has('bio') ? ' has-error' : '' }}">
      <input type="text" name="bio"  value="{{ old('bio') }}" class="form-control" id="bio" placeholder="tell a little bit more..">

       @if ($errors->has('bio'))
                           
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>
  <div class="form-group">
    <label for="profession" class="col-sm-2 control-label">Profession:</label>
    <div class="col-sm-10">
      <select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="profession_category">

     @foreach($question_categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          @if ($errors->has('profession_category'))
                           
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession_category') }}</strong>
                                    </span>
                                @endif
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
 
</form>

@endif






      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="prefereneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="">Change Preference</h3>
         <ul class="nav nav-tabs navbar-left" role="tablist">
    {{-- <li role="presentation" class="question"><a href="#job" aria-controls="question" role="tab" data-toggle="tab">Job</a></li> --}}
    <li role="presentation"><a href="#article" aria-controls="article" role="tab" data-toggle="tab">Article</a></li>
    <li role="presentation" class="active"><a href="#question" aria-controls="job" role="tab" data-toggle="tab">Question</a></li>
  </ul>
      </div>
      <div class="modal-body" style="font-size: 16px !important;margin-top: none !important">
<div>

  <!-- Nav tabs -->
 

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="question">
   {{--  <form class="form-horizontal"> --}}
@if($question_featured_update->isEmpty())
   {!! Form::open(['url' =>'/question-featured','files'=>true,'class'=>"form-horizontal"]) !!}
  <div class="form-group">
    <label for="ques-interest" class="col-md-4 control-label">Interested Category:</label>
    <div class="col-md-8">
    
<select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="category_interest[]" multiple="multiple">

     @foreach($question_categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
    </div>
  </div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save Question Preference</button>
    </div>
  </div>
</form>

@else

 {!! Form::model($question_featured_update ,['url' =>'/question-featured-update','files'=>true,'class'=>"form-horizontal"]) !!}
  <div class="form-group">
    <label for="ques-interest" class="col-md-4 control-label">Interested Category:</label>
    <div class="col-md-8">
    

      <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="category_interest[]" multiple="multiple">
            @foreach($question_categories as $category)
                <option class="success" value="{{$category->id}}"> 
                {{$category->name}}
                </option>
            @endforeach
            
          </select>



<a class="text-left" class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none;font-size: 14px;color:blue">
  Click Me! to Show Your Previous Interested Category
</a>

<div class="collapse" id="collapseExample">
  <div class="well">
    @foreach($question_featured_update as $u_category)
       @foreach($question_categories as $q_category)
          @if($q_category->id == $u_category->interest_id)
               <p>
               {{-- {{App\Category::find($category->id)->name}} --}}
               {{$q_category->name}}
               </p>
             @endif   
            @endforeach
         @endforeach   
  </div>
</div>
      
    </div>
  </div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update Question Preference</button>
    </div>
  </div>
</form>

@endif



    </div>
    <div role="tabpanel" class="tab-pane" id="article">
    @if($article_featured_update->isEmpty())
    {!! Form::open(['url' =>'/article-featured','files'=>true,'class'=>"form-horizontal"]) !!}
  <div class="form-group">
    <label for="article-interest" class="col-md-4 control-label">Interested Category:</label>
    <div class="col-md-8">
     <select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="article_interest[]" multiple="multiple">

    {{--    <select id="ques-interest" style="border:1px solid red !important" class="form-control select2-multi" name="categories[]" multiple="multiple"> --}}
            @foreach($article_categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
    </div>
  </div>
 

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save Article Preference</button>
    </div>
  </div>
</form>

@else 
 {!! Form::open(['url' =>'/article-featured-update','files'=>true,'class'=>"form-horizontal"]) !!}
  <div class="form-group">
    <label for="article-interest" class="col-md-4 control-label">Interested Category:</label>
    <div class="col-md-8">
     <select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="article_interest[]" multiple="multiple">

    @foreach($article_categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>


          <a class="text-left" class="btn btn-primary" role="button" data-toggle="collapse" href="#article_interest" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none;font-size: 14px;color:blue">
  Click Me! to Show Your Previous Interested Category
</a>

<div class="collapse" id="article_interest">
  <div class="well">
    @foreach($article_featured_update as $u_category)
       @foreach($article_categories as $q_category)
          @if($q_category->id == $u_category->interest_id)
               <p>
               {{-- {{App\Category::find($category->id)->name}} --}}
               {{$q_category->name}}
               </p>
             @endif   
            @endforeach
         @endforeach   
  </div>
</div>
    </div>
  </div>
 

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update Article Preference</button>
    </div>
  </div>
</form>
@endif
    </div>

    {{-- <div role="tabpanel" class="tab-pane" id="job">
      <form class="form-horizontal">
  <div class="form-group">
    <label for="job-interest" class="col-md-4 control-label">Interested Category:</label>
    <div class="col-md-8">
     <select id="ques-interest" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="categories[]" multiple="multiple">
         @foreach($job_categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
    </div>
  </div>
  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save Job Preference</button>
    </div>
  </div>
</form>
    </div> --}}
    
  </div>

</div>
  
      </div>
    </div>
  </div>
</div>

                  </div> 
                  <!-- end of container-->    
                </section>
                <!-- end of offers-section -->

                  <section class="feature-section text-center">
                  <div class="container">
                    <div class="row">
                    <div class="col-md-8  text-left" >
                                    <div class="row posted-article">
                                      <div class="col-md-12">
                                           <div class="row">
                                        <div class="button">
                                          <button type="button" class="btn">Your Posted Articles</button>
                                        </div>
                                      </div>
                  @foreach($my_articles as $articles)
                       <div class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}">
                            {{ $articles->title }}
                          </a></p>
                          
                            <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
 {!!str_limit(strip_tags($articles->body),120,'...')!!}
                        </div>
                      </div>
                     <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-offset-6 col-md-6  col-sm-6 col-xs-6 ">
                        <h2 >{{ $articles->total_view }}</h2>
                         <h6>View</h6>
                        </div>
                     </div>
                      </div>
                    </div>
                  @endforeach
                   <a href="#" type="button" class="btn show">Show All</a>
                                      </div>
                                    </div>  
                                    <div class="row posted-questions">
                                      <div class="col-md-12">
                                        <div class="row">
                                        <div class="button">
                                          <button type="button" class="btn">Your Asked Questions</button>
                                        </div>
                                      </div>
                
                     
@foreach($my_question as $questions)
                      <div class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">

              {{ $questions->title }}

                       
                       </a></p>
                         
                         <p>
                          <span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> 
{{ App\User::find($questions->created_by)->name }}
                           </a></span></p>
{!!str_limit(strip_tags($questions->body),120,'...')!!}

                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-offset-6 col-md-6  col-sm-6 col-xs-6 ">
                        <h2 >{{ $questions->total_view }}</h2>
                         <h6>Total View</h6>
                        </div>
                     </div>
                      </div>
                    </div>
@endforeach

                    <a href="#" type="button" class="btn show">Show All</a>
                                      </div>
                                    </div>
                      </div>  
                         <div class="col-md-4 right-sidebar">
                         <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12 feature-articles feature-jobs ">
                        <ul class="text-left">
                        <li class="button">
                        <button class="btn btn-lg">Credentials & Highlights</button></li>
                   
                   <li >
                   <p><span><b>Company Name:</b></span> Abcd LTD.</p>
                   <p><span><b>Job Title:</b></span> Software Engineer</p>
                   <p><span><b>Location:</b></span> Dhanmondi, Dhaka</p>
                   <span class="details"><a href="#"> Details</a></span>
                   </li>
                  

                                              
                   </ul>
                    <button class="btn show">Show All</button>
                    </div>                      
                    </div>
                    <!-- end of featured jobs -->

                      <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12 feature-articles feature-jobs ">
                        <ul class="text-left">
                        <li class="button">
                        <button class="btn btn-lg">Saved Jobs</button></li>
             @if(!$saved_job->isEmpty())
                @foreach($saved_job as $jobs_saved)
                   @foreach($total_jobs as $total_job)
                     @if($jobs_saved->jobs_id == $total_job->id)
                      <li >
                   <p><span><b>Company Name:</b>
                   </span> {{ $total_job->company_title }}</p>
                   <p><span><b>Job Title:</b></span> {{ $total_job->name }}</p>
                   <p><span><b>Location:</b></span> {{ $total_job->location }}</p>
                   <span class="details">
                   <a href="{{ url('job_details/'.$total_job->id) }}"> Details</a></span>
                   </li>
                   @endif
                  @endforeach
                 @endforeach    
              @endif

                                              
                   </ul>
                    <button class="btn show">Show All</button>
                    </div>                      
                    </div>
                    <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12 feature-articles">
                    
                        <ul class="text-left">
                        <li class="button"><button class="btn btn-lg">Your Communities</button></li>
                        <?php $i=1 ?>
                   @foreach($my_community as $community)
                   <li ><a href="{{url('groups/'.$community->group_id)}}">{{$i++}}. &nbsp {{App\Group::find($community->group_id)->name}}</a></li>
                   
                  @endforeach
          
                   </ul>
                    <button class="btn show">Show All</button>
                    </div>   
                      </div>                      
                    
                    <!-- end of featured articles -->
 
                      </div>                 
                    </div>
                    <!-- end of row --> 
                  </div> 
                  <!-- end of container-->    
                </section>
                <!-- end of featured-section -->

@endsection
@section('script')
 <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

@endsection
