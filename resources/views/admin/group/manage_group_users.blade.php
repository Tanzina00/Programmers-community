@extends('admin.master')
@section('title','| Group')

@section('maincontent')

	<h1>{{$currentgroup->name}}</h1>	
	  <div class="row">
        <div class="col-xs-12">
          <div class="box text-center">
            <div class="box-header">
              <h3 class="box-title">
{{$currentgroup->name}} Total User: {{count($total_user)}}

                 
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body">

         <div class="row">
         @foreach($total_user as $total_users)

         <?php $i=0?>
           @foreach($alluser as $allusers)
@if($allusers->id ==$total_users->users_id && $total_users->user_role == "admin")
<div class="col-sm-2 col-md-2">
    <div class="thumbnail">
      <img src="{!! asset('images/user.jpg') !!}" alt="user">
      <div class="caption">
        <h5 title="{{ $allusers->email }}">{{$allusers->name}}</h5>
        <p>
        <strong>Admin <i class="fa fa-check-square-o" style="color: green" aria-hidden="true"></i>
</strong>

        {{ Form::open(['url'=>['admin/remove-group-member',$total_users->users_id],'method'=>'DELETE']) }}

      {{ Form::submit('Remove User',['class'=>"btn btn-danger btn-block text-center"]) }}
      {{ Form::close() }}
        </p>
      </div>
    </div>
 </div>
@endif


@if($allusers->id ==$total_users->users_id && $total_users->user_role == "user")
  <div class="col-sm-2 col-md-2">
    <div class="thumbnail">
      <img src="{!! asset('images/user.jpg') !!}" alt="user">
      <div class="caption">
        <h5 title="{{ $allusers->email }}">{{$allusers->name}}</h5>
        <p>
        

        {{ Form::open(['url'=>['admin/remove-group-member',$total_users->users_id],'method'=>'DELETE']) }}

      {{ Form::submit('Remove User',['class'=>"btn btn-danger btn-block text-center"]) }}
      {{ Form::close() }}
        </p>
      </div>
    </div>
 </div>
 <?php $i++?>
 @endif
@endforeach
@endforeach

</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
@endsection