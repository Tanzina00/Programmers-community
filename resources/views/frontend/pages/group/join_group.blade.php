@extends('frontend.master')
@section('title','| The Job')
@section('top_menu')
        @include('frontend.include.top_menu')
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
        
     </div> 
    </div>
  </div> 
 
  </section>
   <!-- end of cover pic section -->
@endsection

@section('maincontent')

  <div class="col-md-6 col-md-offset-3" >
   {{ Form::open(['url' =>'/add-member', 'method' => 'POST']) }}
         <input type="hidden" name="group_id" value="{{$current_group->id}}">
         <input type="hidden" name="id" value="{{ Auth::user()->id}}">
    {{ Form::submit('Join Group', array('class' => 'btn btn-primary btn-block')) }}
{{ Form::close() }}


   </div>
       
@endsection

