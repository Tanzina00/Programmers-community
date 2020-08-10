@extends('frontend.master')
@section('title','| Welcome to my site')

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
    <a href="{{url('/old-article')}}"><h5>Old Question</h5> </a></li>
    <li style="display:inline-block !important;"><a href="#"><h5>Featured</h5></a></li>
   
    
  </ul>
    
  </div>
  </div>
  <div class="nav second-nav col-md-6">
    <div class="navbar-right filters">
                      <ul class="filter ">
       <li class="dropdown">
          <button href="#" class="button btn btn-lg dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filters <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/most-viewed-articles') }}"> Most Viewed </a></li>
                           <li><a href="{{ url('/last-week-articles')}}">Last Week</a></li>
                           <li><a href="{{ url('/last-month-articles')}} "> Last Month </a></li>
                           <li><a href="{{ url('/last-year-articles')}} "> Last year </a></li>
                           <li><a href="{{ url('/most-discuss-articles')}}"> Most Discussed </a></li>
          </ul>
        </li> 
        </ul>   
  </div>
  </div>
  </div>
@if($article_justify == "most discuss")
           @foreach($comment_count as $comment_counts)
                    @foreach($article as $articles) 
                       @if($articles->id == $comment_counts->article_id)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}" style="font-size: 18px">
                              
                              {{ $articles->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
                         
                           {!!str_limit(strip_tags($articles->body),150,'...')!!}
 
                            
                          <p class="tags">
                              Category>>
                              <a href="{{url('/article-categories',$articles->category_id)}}">{{
                             $articles->category_id}}</a>  <br>
                    
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 " style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 > {{ $articles->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6" style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 >
                        
                        {{ $articles->comments()->count() }}

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

{{ $article->links() }}

  </ul>
</nav>

 @elseif($article_justify == "most view") 

   @foreach($article as $articles)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}" style="font-size: 18px">
                              
                              {{ $articles->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
                         
                           {!!str_limit(strip_tags($articles->body),150,'...')!!}
 
                            
                          <p class="tags">
                              Category>>
                              <a href="{{url('/article-categories',$articles->category_id)}}">{{
                             $articles->category_id}}</a>  <br>
                    
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 " style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 > {{ $articles->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6" style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 >
                        
                        {{ $articles->comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                  @endforeach
                   
                    <nav aria-label="...">
  <ul class="text-center">

{{ $article->links() }}

  </ul>
</nav>

@elseif($article_justify == "last year top") 

   @foreach($comment_count as $comment_counts)
   @foreach($article as $articles)
    @if($articles->created_at == $comment_counts->created_at)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}" style="font-size: 18px">
                              
                              {{ $articles->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
                         
                           {!!str_limit(strip_tags($articles->body),150,'...')!!}
 
                            
                          <p class="tags">
                              Category>>
                           <a href="{{url('/article-categories',$articles->category_id)}}">{{
                             $articles->category_id}}</a>  <br>
                    
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 " style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 > {{ $articles->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6" style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 >
                        
                        {{ $articles->comments()->count() }}

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

{{ $article->links() }}

  </ul>
</nav>
@elseif($article_justify == "last month top") 

  @foreach($comment_count as $comment_counts)
   @foreach($article as $articles)
    @if($articles->created_at == $comment_counts->created_at)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}" style="font-size: 18px">
                              
                              {{ $articles->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
                         
                           {!!str_limit(strip_tags($articles->body),150,'...')!!}
 
                            
                          <p class="tags">
                              Category>>
                              <a href="{{url('/article-categories',$articles->category_id)}}">{{
                             $articles->category_id}}</a> <br>
                    
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 " style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 > {{ $articles->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6" style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 >
                        
                        {{ $articles->comments()->count() }}

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

{{ $article->links() }}

  </ul>
</nav>
@elseif($article_justify == "last week top") 
 @foreach($comment_count as $comment_counts)
   @foreach($article as $articles)
    @if($articles->created_at == $comment_counts->created_at)

                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}" style="font-size: 18px">
                              
                              {{ $articles->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
                         
                           {!!str_limit(strip_tags($articles->body),150,'...')!!}
 
                            
                          <p class="tags">
                              Category>>
                     <a href="{{url('/article-categories',$articles->category_id)}}">{{
                             $articles->category_id}}</a>  <br>
                    
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 " style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 > {{ $articles->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6" style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 >
                        
                        {{ $articles->comments()->count() }}

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

{{ $article->links() }}

  </ul>
</nav>
@elseif($article_justify == "old") 

   @foreach($article as $articles)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}" style="font-size: 18px">
                              
                              {{ $articles->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
                         
                           {!!str_limit(strip_tags($articles->body),150,'...')!!}
 
                            
                          <p class="tags">
                              Category>>
                               <a href="{{url('/article-categories',$articles->category_id)}}">{{
                             $articles->category_id}}</a> <br>
                    
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 " style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 > {{ $articles->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6" style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 >
                        
                        {{ $articles->comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                  @endforeach
                   
                    <nav aria-label="...">
  <ul class="text-center">

{{ $article->links() }}

  </ul>
</nav>

@elseif($article_justify == "normal") 

   @foreach($article as $articles)
                    <div  class="row featured-question">
                      <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="question">
                          <p title=" {{ $articles->title }}">
                          <a href="{{ url('/article',$articles->slug) }}" style="font-size: 18px">
                              
                              {{ $articles->title }}

                          </a>
                        </p>
                          <p><span class="date">
                          {{ date('d-M-y',strtotime($articles->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($articles->created_at)) }}</span> by<span class="post-owner"><a href="#"> {{ App\User::find($articles->user_id)->name }} </a></span></p>
                         
                           {!!str_limit(strip_tags($articles->body),150,'...')!!}
 
                            
                          <p class="tags">
                              Category>>
     <a href="{{url('/article-categories',$articles->category_id)}}">{{
                             $articles->category_id}}</a> <br>
                    
                          </p>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                      <div class="row">
                        <div class="views-number col-md-6 col-sm-6 col-xs-6 " style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 > {{ $articles->total_view }}</h2>
                         <h6>VIEWS</h6>
                        </div>
                        <div class="comments-number col-md-6 col-sm-6 col-xs-6" style="width: 95px;padding: 16px 0;margin-top: 18px">
                        <h2 >
                        
                        {{ $articles->comments()->count() }}

                        </h2>
                         <h6>COMMENT</h6> 
                        </div>
                     </div>
                      </div>
                    </div>
                  @endforeach
                   
                    <nav aria-label="...">
  <ul class="text-center">

{{ $article->links() }}

  </ul>
</nav>
@endif
 </div>  
                         <div class="col-md-3 right-sidebar">
                        
                    <div class="row">
               <div class="col-md-12 col-sm-6 col-xs-12 filter categories">
                    <button class="button btn btn-lg">Categories</button>
                        <ul class="text-left">
                   @foreach($category as $categories)
                   <li >
                   <a href="{{ url('/article-categories',str_slug(strtolower($categories->name))) }}">{{$categories->name}} </a>

                  <span class="">
                 <?php $i=0 ?>
                  @foreach($article_total as $questions)
                     @if(str_slug(strtolower($categories->name)) == $questions->category_id)
                         <?php $i++ ?>
                     @endif
                  @endforeach 
              {{ $i }}
                  </span>

                  </li>
                  @endforeach
               </ul>

            {{--    <button class="button btn btn-lg">Popular Tag</button>
                        <div  style="border:2px solid orange">
                   @foreach($alltag as $tags)
                   <a href="{{ url('/tag_post',$tags->id) }}" style="text-decoration: none"> <span class="label label-warning"> {{ $tags->name }}</span></a> 

                    @endforeach
 </div> --}}
               
                    </div>   


                    </div>


                    <!-- end of categories -->
                      </div> 




@endsection