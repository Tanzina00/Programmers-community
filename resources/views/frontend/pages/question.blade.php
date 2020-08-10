@extends('frontend.master')
@section('title','| Question')

@section('top_menu')
        @include('frontend.include.top_menu')
@endsection

@section('asksection')
        @include('frontend.include.asksection')
@endsection

@section('maincontent')


                    <div class="col-md-9  text-left" >
                      <!-- Nav tabs -->
 
  <div class=" row">
  <div class="nav second-nav col-md-6">
  <div class="navbar-left">
  <ul>
   <li style="display:inline-block !important;" class="active">
    <a href="{{url('/old-question')}}">
       <h5>Old Question</h5> 
    </a></li>
    
    {{--  <li style="display:inline-block !important;" class="active">
    <a href="{{url('/old-question')}}">
       <h5>Featured Question</h5> 
    </a></li> --}}
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

                    @foreach($question as $questions)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $questions->title }}">
                          <a href="{{ url('/question',$questions->slug) }}">
                              
                              {{ $questions->title }}

                          </a>
                        </p>
                          <p>
                          <span class="date">
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
                      </div>  
                         <div class="col-md-3 right-sidebar">
                        
                    <div class="row">
               <div class="col-md-12 col-sm-6 col-xs-12 filter categories">
                    <button class="button btn btn-lg">Categories</button>
                        <ul class="text-left">

            @foreach($category as $categories)

                 <li >
                 
                 <a href="{{url('/categories',str_slug(strtolower($categories->name))) }}">{{$categories->name}} </a>
                   <span class="">
                   <?php $i=0 ?>
                  @foreach($question_total as $questions)
@if(str_slug(strtolower($categories->name)) == $questions->category_id)
                         <?php $i++ ?>
                     @endif
                  @endforeach 
              {{ $i }}

                   </span>

                </li>
                  @endforeach
               </ul>

               <button class="button btn btn-lg">Popular Tag</button>
                        <div  style="border:2px solid orange">
                   @foreach($alltag as $tags)
                   <a href="{{ url('/tag_post',$tags->id) }}" style="text-decoration: none"> <span class="label label-warning"> {{ $tags->name }}</span></a> 

                    @endforeach
 </div>
               
                    </div>   


                    </div>


                    <!-- end of categories -->
                      </div> 



<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
@endsection