@extends('frontend.master')
@section('title','| The Job')
@section('top_menu')
        @include('frontend.include.top_menu')
@endsection


@section('stylesheet')
{!! Html::style('css/select2.min.css') !!}
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https:/resources/demos/style.css">
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
    selector: "#submitpostId",  // change this value according to your HTML
    menubar: false,
    plugins: "advlist lists link code image",
    toolbar: 'undo redo | bold italic| bullist numlist | image link code',
  });

  </script>
@endsection


@section('asksection')
{!! Html::style('frontend-style/css/group.css') !!}
        
          <section class="coverphoto"> 
  <div class="coverbg container" style="background:black !important; height: 170px">  
    <div class="row">
      <div class="col-md-12">
      <div class="cover-pic">
       {{--  <img src="{!! asset('frontend-style/images/nature.jpeg') !!}" class="img-responsive"> --}}
      </div>
         
      </div>
    </div>
  </div>
   <div class="container group-desc">
    <div class="row">
     <div class="col-md-offset-1 col-md-5 group-name">
       <h2><a>{{ $current_group->name }}</a></h2>
      
     </div> 
      <div class="col-md-5 joined">
         <ul class="nav navbar-nav navbar-right">
         <li class="dropdown ">
            <button  class="dropdown-toggle btn join" data-toggle="dropdown">Change <b class="caret"></b></button>
            <ul class="dropdown-menu">
             
              <li><a href="#">Leave Group</a></li>
            </ul>
          </li>

           
        </ul>
     </div> 
    </div>
  </div> 
 
  </section>
   <!-- end of cover pic section -->
@endsection

@section('maincontent')

  <div class="col-md-8" >
  <div class="" style="margin-top: 14px;">
   {!! Form::open(['url' =>'/group-post','files'=>true]) !!}

    <input type="hidden" name="group_id" value="{{ $current_group->id }}">
            {!! Form::textarea('body',null, [
            "class" =>"form-control",
            "rows" =>"6",
            "id"=>"submitpostId"
            ]);!!}
            @if($errors->has('body'))
            <label style="color: red"> {{ $errors->first('body') }} </label>
            @endif
            
 <div class="box-footer text-right">
                <button type="submit" class="btn btn-primary">Submit Post</button>
              </div>
           {!! Form::close()!!}

  </div>

<div>
	

        @foreach($groups_post as $group_post)
        <div class="comment">
            <div class="author-info">
                <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($group_post->email)))."?s=50&d=mm" }}" class="author-image">
                <div class="author-name">
                    <h4>{{ 
                       App\User::find($group_post->user_id)->name
                         

                    	}}</h4>
                    <p class="author-time" style="color: orange">
                    {{ date('d-M-y',strtotime($group_post->created_at)) }}
                           </span> at 
                          <span class="time"> {{ date('h:i A',strtotime($group_post->created_at)) }}</span>
                     </p>
                </div>
            </div>

          <div class="comment-content text-left" style="font-size: 15px" >
              
{!!str_limit(strip_tags($group_post->body),350,'...')!!} 
@if(strlen(strip_tags($group_post->body))>350)
       <a href="{{ url('post-details/'.$group_post->group_id.'/'.$group_post->id) }}" style="text-decoration: none;font-size: 16px; color:orange">  Learn More</a>
          @endif
               <br>

               <h4 style="margin-top: 6px">
               <span class="glyphicon glyphicon-comment" style="color: orange"></span><a href="{{ url('post-details/'.$group_post->group_id.'/'.$group_post->id) }}" style="text-decoration: none; color: orange">
See All Comments</a>
    </h4>

          </div>
          



        </div>
        @endforeach


</div>





</div>
       <div class="col-md-4">

<div class="" style="margin-top: 14px;">
 <div class="member">
     <div class="memberbtn">
     <button class="addmember"><a>Add Member</a></button>
     <button class="members"><a>Member</a></button>
       </div>
       <div class="addmemberdesc">
         {{ Form::open(['url' =>'/add-member', 'method' => 'POST']) }}
         <input type="hidden" name="group_id" value="{{$current_group->id}}">
    {{ Form::text('tags', '', ['id' =>  'tags', 'placeholder' =>  'Search users'])}}
    <input type="hidden" name="id" id="id">
    {{ Form::submit('Add Member', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
       </div>
       <div class="membersdes ">
         <span class="text-left"><a href="#">Members</a></span>
         <span class="mem-num text-right"><a href="#">40 members</a></span>
         <div class="col-md-12">
         <div class="img">
           <img src="{!! asset('frontend-style/images/nature.jpeg') !!}" class="img-responsive">
           </div>
            <div class="img">
           <img src="{!! asset('frontend-style/images/nature.jpeg') !!}" class="img-responsive">
           </div>
            <div class="img">
           <img src="{!! asset('frontend-style/images/nature.jpeg') !!}" class="img-responsive">
           </div>
            <div class="img">
           <img src="{!! asset('frontend-style/images/nature.jpeg') !!}" class="img-responsive">
           </div>
           <div class="img">
           <img src="{!! asset('frontend-style/images/nature.jpeg') !!}" class="img-responsive">
           </div>
         </div>
         <p class="more"><a>see more</a></p>
       </div>
     </div> 

       </div>




</div>
@endsection

@section('script')

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
 
 $('input:text').bind({

 });
    $( "#tags" ).autocomplete({
    	minLength:1,
    	autoFocus:true,
      source: "{{ URL('search-autocomplete') }}",
      select: function(event, ui) {
        $('#id').val(ui.item.id);
        $('#tags').val(ui.item.value);
}
    });
  });
  </script>
@endsection