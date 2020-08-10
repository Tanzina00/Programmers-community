@extends('frontend.master')
@section('title','| Question')
@section('top_menu')
        @include('frontend.include.top_menu')
@endsection
@section('asksection')
        @include('frontend.include.asksection')
@endsection

@section('maincontent')


                    <div class="col-md-8  text-left" >
                      <!-- Nav tabs -->
  <div class="nav">
  <div class="navbar-left">
  <ul >
    <li>
     <a href="{{ url('/question_create') }}" class=""><h2> Ask A Question</h2></a> 
    </li>
  </ul>    
  </div> 
  </div>
  <div class=" row">
  <div class="nav second-nav col-md-6">
  <div class="navbar-left">
  <ul>
    <li style="display:inline-block !important;" class="active">
    <a href="{{url('/old-question')}}">
       <h5>Old Question</h5> 
    </a></li>
    
     <li style="display:inline-block !important;" class="active">
    <a href="{{url('/old-question')}}">
       <h5>Featured Question</h5> 
    </a></li>
  </ul>
    
  </div>
  </div>
  <div class="nav second-nav col-md-6">
    <div class="navbar-right filters">
                      <ul class="filter ">
       <li class="dropdown">
          <button href="#" class="button btn btn-lg dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filters <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/most-viewed') }}"> Most Viewed </a></li>
                           <li><a href="{{ url('/last-week')}}">Last Week</a></li>
                           <li><a href="{{ url('/last-month')}} "> Last Month </a></li>
                           <li><a href="{{ url('/last-year')}} "> Last year </a></li>
                           <li><a href="{{ url('/most_discuss')}}"> Most Discussed </a></li>
          </ul>
        </li> 
        </ul>   
  </div>
  </div>
  </div>
  @if($question_justify == "most_discuss")
                @foreach($comment_count as $comment_counts)
                    @foreach($question as $questions)
                      @if($questions->id == $comment_counts->question_id)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($questions->created_by)->name }} </a></span></p>
                          <p class="tags">tags:

                       @foreach($all_questions_tag as $all_questions_tags)
             @if($all_questions_tags->question_id == $questions->id)
             <a href="{{ url('/tagged',$all_questions_tags->tag_id) }}"> <span> 
             {{ $all_questions_tags->tag_id }}</span></a>
             @endif
         
        @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 ">
                        <h2 > {{ $questions->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6">
                        <h2 >
                        
                        {{ $questions->question_comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                    @endif
                  @endforeach
                @endforeach  

     <nav aria-label="...">
  <ul class="text-center">

{{ $question->links() }}

  </ul>
</nav>
  @elseif($question_justify == "last week top")
                @foreach($comment_count as $comment_counts)
                    @foreach($question as $questions)
                      @if($questions->created_at == $comment_counts->created_at)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($questions->created_by)->name }} </a></span></p>
                          <p class="tags">tags:

                       @foreach($all_questions_tag as $all_questions_tags)
             @if($all_questions_tags->question_id == $questions->id)
             <a href="{{ url('/tagged',$all_questions_tags->tag_id) }}"> <span> 
             {{ $all_questions_tags->tag_id }}</span></a>
             @endif
         
        @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 ">
                        <h2 > {{ $questions->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6">
                        <h2 >
                        
                        {{ $questions->question_comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                    @endif
                  @endforeach
                @endforeach  
        <nav aria-label="...">
  <ul class="text-center">

{{ $question->links() }}

  </ul>
</nav>
  @elseif($question_justify == "last month top")
                @foreach($comment_count as $comment_counts)
                    @foreach($question as $questions)
                      @if($questions->created_at == $comment_counts->created_at)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($questions->created_by)->name }} </a></span></p>
                          <p class="tags">tags:

                       @foreach($all_questions_tag as $all_questions_tags)
             @if($all_questions_tags->question_id == $questions->id)
             <a href="{{ url('/tagged',$all_questions_tags->tag_id) }}"> <span> 
             {{ $all_questions_tags->tag_id }}</span></a>
             @endif
         
        @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 ">
                        <h2 > {{ $questions->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6">
                        <h2 >
                        
                        {{ $questions->question_comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                    @endif
                  @endforeach
                @endforeach  
       <nav aria-label="...">
  <ul class="text-center">

{{ $question->links() }}

  </ul>
</nav>

  @elseif($question_justify == "last year top")
                @foreach($comment_count as $comment_counts)
                    @foreach($question as $questions)
                      @if($questions->created_at == $comment_counts->created_at)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($questions->created_by)->name }} </a></span></p>
                          <p class="tags">tags:

                        @foreach($all_questions_tag as $all_questions_tags)
             @if($all_questions_tags->question_id == $questions->id)
             <a href="{{ url('/tagged',$all_questions_tags->tag_id) }}"> <span> 
             {{ $all_questions_tags->tag_id }}</span></a>
             @endif
         
        @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 ">
                        <h2 > {{ $questions->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6">
                        <h2 >
                        
                        {{ $questions->question_comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                    @endif
                  @endforeach
                @endforeach  

       <nav aria-label="...">
  <ul class="text-center">

{{ $question->links() }}

  </ul>
</nav>
  @elseif($question_justify == "old")
               
                    @foreach($question as $questions)
                  
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($questions->created_by)->name }} </a></span></p>
                          <p class="tags">tags:

                       @foreach($all_questions_tag as $all_questions_tags)
             @if($all_questions_tags->question_id == $questions->id)
             <a href="{{ url('/tagged',$all_questions_tags->tag_id) }}"> <span> 
             {{ $all_questions_tags->tag_id }}</span></a>
             @endif
         
        @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 ">
                        <h2 > {{ $questions->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6">
                        <h2 >
                        
                        {{ $questions->question_comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                 
                
                @endforeach  

        <nav aria-label="...">
  <ul class="text-center">

{{ $question->links() }}

  </ul>
</nav>

  @elseif($question_justify == "most_view")
               
                    @foreach($question as $questions)
                    
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($questions->created_by)->name }} </a></span></p>
                          <p class="tags">tags:

                        @foreach($all_questions_tag as $all_questions_tags)
             @if($all_questions_tags->question_id == $questions->id)
             <a href="{{ url('/tagged',$all_questions_tags->tag_id) }}"> <span> 
             {{ $all_questions_tags->tag_id }}</span></a>
             @endif
         
        @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 ">
                        <h2 > {{ $questions->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6">
                        <h2 >
                        
                        {{ $questions->question_comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                 
                  @endforeach
             
       <nav aria-label="...">
  <ul class="text-center">

{{ $question->links() }}

  </ul>
</nav>

 @elseif($question_justify == "normal")
   @foreach($question as $questions)
 <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($questions->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($questions->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($questions->created_by)->name }} </a></span></p>
                          <p class="tags">tags:

                       @foreach($all_questions_tag as $all_questions_tags)
             @if($all_questions_tags->question_id == $questions->id)
             <a href="{{ url('/tagged',$all_questions_tags->tag_id) }}"> <span> 
             {{ $all_questions_tags->tag_id }}</span></a>
             @endif
         
        @endforeach
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 ">
                        <h2 > {{ $questions->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6">
                        <h2 >
                        
                        {{ $questions->question_comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
@endforeach 
     <nav aria-label="...">
  <ul class="text-center">

{{ $question->links() }}

  </ul>
</nav>
 @endif                   
               
                      </div>  
                      

                       <div class="col-md-4 right-sidebar">
                    <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12 feature-articles">
                    
                        <ul class="text-left">
                        <li class="button">
                        <button class="btn btn-lg">Featured Articles</button>
                        </li>
                     @foreach($article as $articles)
                   <li title="{{$articles->title}}">
                   <a href="{{ url('/article',$articles->slug) }}">
                  {{ str_limit($articles->title,40,'...')   }}

                   </a>
                   </li>
                  @endforeach
          
                   </ul>
                    </div>                      
                    
                    <!-- end of featured articles -->

                    
                    <div class="col-md-12 col-sm-6 col-xs-12 feature-articles feature-jobs ">
                        <ul class="text-left">
                        <li class="button">
                            <button class="btn btn-lg">Looking your Jobs</button>
                        </li>
                   
                   @foreach($total_jobs as $t_jobs)
                   <li >
                   <p><span><b>Company Name:</b> </span> {{ $t_jobs->company_title }}</p>
                   <p><span><b>Job Title:</b> </span> {{ $t_jobs->name }}</p>
                   <p><span><b>Location:</b> </span> {{ $t_jobs->location }}</p>
                   <span class="details">
<a href="{{ url('job_details',$t_jobs->id) }}"> Details</a>
                   </span>
                   </li> 
                  @endforeach                             
                   </ul>
                    </div>                      
                    </div>
                    <!-- end of featured jobs -->
                      </div> 





@endsection