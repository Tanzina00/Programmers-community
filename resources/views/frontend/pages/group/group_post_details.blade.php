@extends('frontend.master')
@section('title')
{{-- {{ $article->title }} --}}
group post
@endsection
@section('top_menu')
        @include('frontend.include.top_menu')
@endsection
@section('maincontent')
{!! Html::style('frontend-style/css/group.css') !!}

                    <div class="col-md-9  text-left" >
                    <div class="row">
                    	

                 <div class="col-md-11 col-md-offset-1" style="font-size: 15px">
                 
                    {!!  strip_tags($group_post_details->body) !!}
                    </div>

            </div>
        </div>
<div class="col-md-3">
            <div class="well well-lg">
                 <dl class="dl-horizontal" >
                    <dt style="text-align: left !important;width: 82px">Created At: </dt>
                   <p style="text-align: left !important">{{ date('M j, Y h:ia',strtotime($group_post_details->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <dt style="text-align: left !important;width: 82px">Posted by:</dt>
                   <p style="text-align: left !important">
                    
                    {{ App\User::find($group_post_details->user_id)->name }}

                   </p>
                </dl>
                @if($group_post_details->user_id == Auth::user()->id)
                <dl class="dl-horizontal">
                   
                   <a href="" class="btn btn-block btn-primary">Edit</a>
                </dl>
            @endif


            </div>


        </div>


  
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <br> <br>
    <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>

{{$posts_comments->count()}} Comments
    </h3>
        @foreach($posts_comments as $comment)
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
             
          {!!  strip_tags($comment->comment) !!}

          </div>
          
        </div>
@endforeach
    </div>
</div>




                    <div class="row">
<div id="comment-form" class="col-md-7 col-md-offset-1">
   
 {!! Form::open(['url' =>'/post-comments','class'=>'form-horizontal']) !!}
  <div class="form-group">
   <input type="hidden" name="group_id" value="{{$group_post_details->group_id}}">
     <input type="hidden" name="posts_id" value="{{$group_post_details->id}} ">

    <label for="inputEmail3" style="margin-top: 20px;" class="col-sm-2 control-label">Comment: </label>
    <div class="col-sm-10">
                    
   
{!! Form::textarea('comment',null, [
            "class" =>"form-control",
            'rows'=>'4',
            'id'=>'group_comment_style',
            
]);!!}

    </div>
  </div>
 
  <div class="form-group" style="text-align:left !important;">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" >Add Comment</button>
    </div>
  </div>
</form>


            <br>
            <br>

</div>
</div>




@endsection                    