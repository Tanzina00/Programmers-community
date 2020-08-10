@extends('frontend.master')
@section('title')
{{ $article->title }}
@endsection

@section('top_menu')
        @include('frontend.include.top_menu')
@endsection

@section('maincontent')
<link rel="stylesheet" type="text/css" href="https://jmblog.github.io/color-themes-for-google-code-prettify/themes/atelier-cave-light.min.css">

                    <div class="col-md-9  text-left" >
                    <div class="row">
                    	<div class="col-md-12">
                    		   <h1 class="text-center" 
 style="font-size: 23px;line-height: 1.35; font-weight: normal;margin-bottom: .5em;">
                      	{{ $article->title }}
                      	<br>
                      	<br>
                      </h1>
                    	</div>

                 <div class="col-md-11 col-md-offset-1" style="font-size: 16px">
                    	<pre class="prettyprint">
                      <code>
                        {!! $article->body !!}
                      </code>
                      </pre>
 <br>
                            <p class="tags">Category:
                     <label class="label label-warning">  {!! $article->category_id !!}
                            </label> 
                          </p>
                          <br>
                            <p class="tags">tags:

                       @foreach($question_tag as $alltag)
                         <a href="{{ url('/tagged',$alltag->tag_id) }}" style="text-decoration: none"> <span class="label label-warning" > {{ $alltag->tag_id }}</span></a> 
                        @endforeach
                          </p>
                          <br>

                    </div>

      


                    </div>
                     

                    
                   
                    </div>

                  <div class="col-md-3">
            <div class="well well-lg">
                 <dl class="dl-horizontal" >
                    <dt style="text-align: left !important;width: 82px">Created At: </dt>
                   <p style="text-align: left !important">{{ date('M j, Y h:ia',strtotime($article->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <dt style="text-align: left !important;width: 82px">Posted by:</dt>
                   <p style="text-align: left !important">
                    
                    {{ App\User::find($article->created_by)->name }}

                   </p>
                </dl>

                @if( Auth::check() && $article->created_by == Auth::user()->id )
                <dl class="dl-horizontal">
                  
  <a href="{{ route('question.edit',$article->slug) }}" class="btn btn-block btn-primary">Edit</a>
                </dl>
            @endif


            </div>


        </div>


  
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>
{{$article->question_comments()->count()}} Comments
    </h3>
        @foreach($article->question_comments as $comment)
        <div class="comment">
            <div class="author-info">
                <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=mm" }}" class="author-image">
                <div class="author-name">
                    <h4>{{$comment->name}}</h4>
                    <p class="author-time">
                        {{date('F ns, Y - g:iA' ,strtotime($comment->created_at))}}
                    </p>
                </div>
            </div>

          <div class="comment-content">
              {{$comment->comment}} <br>
        
  </div>
          
        </div>
@endforeach
    </div>
</div>






                    <div class="row">
<div id="comment-form" class="col-md-8 col-md-offset-2">
     {!! Form::open(['route' => ['question_comments.store',$article->slug],'method'=>'POST']) !!}
     <input type="hidden" name="category_id" value="{{$article->category_id}}">
    <div class="row">
         @if(!Auth::check())
        <div class="col-md-6">
             {!! Form::label('name', 'Name: ');!!}
            {!! Form::text('name',null, [
            "class" =>"form-control",
            "value"=>"{{ old('name') }}",
            ]);!!}
             @if ($errors->has('name'))
                          
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="col-md-6">
             {!! Form::label('email', 'Email: ');!!}
            {!! Form::text('email',null, [
            "class" =>"form-control",
            "value"=>"{{ old('email') }}",
            ]);!!}
             @if ($errors->has('email'))
                          
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>
        @endif
        <div class="col-md-12">
             {!! Form::label('comment', 'Comment: ');!!}
            {!! Form::textarea('comment',null, [
            "class" =>"form-control",'rows'=>'5'
            
            ]);!!}
             @if ($errors->has('comment'))
                          
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>


     {{ Form::submit('Add Comment',[
                        "class"=>"btn btn-lg btn-success btn-block",
                        "style"=>"margin-top:15px;"
                        ])}}
            {!! Form::close() !!}
            <br>
            <br>

</div>
</div>

<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
@endsection                    