@extends('frontend.master')
@section('title','| '.$name)

@section('top_menu')
        @include('frontend.include.top_menu')
@endsection

@section('asksection')
        @include('frontend.include.asksection')
@endsection

@section('maincontent')


                    <div class="col-md-9  text-left" >
    @if($question->isEmpty())    
       <h3 class="text-center"> <strong>Ohh! sorry!</strong>
       {{$name}} have no Question
       </h3> 
    @else      
    <h3 class="text-center"> <span style="border-bottom:2px solid #f90"> Total {{ count($question) }} {{$name}} question found </span> </h3> 
    <br>    
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

              @endif        
 



  
                      </div>  
                         <div class="col-md-3 right-sidebar">
                        
                    <div class="row">
               <div class="col-md-12 col-sm-6 col-xs-12 filter categoriesfilter" >
                    <button class="button btn btn-lg">Categories</button>
                        <ul class="text-left">
                   @foreach($category as $categories)
                   <li >
<a href="{{url('/categories',str_slug(strtolower($categories->name))) }}">
{{$categories->name}} </a>
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

             
               
                    </div>   


                    </div>


                    <!-- end of categories -->
                      </div> 



<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
@endsection