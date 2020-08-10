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
       <h2><a>Create New Group</a></h2>
      
     </div> 
      <div class="col-md-5 joined">
         {{-- <ul class="nav navbar-nav navbar-right">
         <li class="dropdown ">
            <button  class="dropdown-toggle btn join" data-toggle="dropdown">Change <b class="caret"></b></button>
            <ul class="dropdown-menu">
              <li><a href="#">Unfollow group</a></li>
              <li><a href="#">Leave Group</a></li>
            </ul>
          </li>

           
        </ul> --}}
     </div> 
    </div>
  </div> 
 
  </section>
   <!-- end of cover pic section -->
@endsection

@section('maincontent')

  <div class="col-md-8 col-md-offset-2" >
  <div class="" style="margin-top: 14px;">
   {!! Form::open(['url' =>'/save-group','files'=>true]) !!}

       <div class="form-group">
     <label for="exampleInputEmail1">Group Title</label>
     <input type="text" class="form-control" name="name" placeholder="Group Title">
     </div>
            
            <div class="box-footer text-right">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Create Group</button>
              </div>
      {!! Form::close()!!}

  </div>
</div>
@endsection

