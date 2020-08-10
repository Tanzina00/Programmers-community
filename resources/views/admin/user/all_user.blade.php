@extends('admin.master')
@section('title','| Group')

@section('maincontent')

	<h1>All User</h1>	
	  <div class="row">
        <div class="col-xs-12">
          <div class="box text-center">
            <div class="box-header">
              <h3 class="box-title">
Total User ({{count($alluser)}})

                 
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body">

         <div class="row">

         @foreach($alluser as $all_users)
      
         
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img src="{!! asset('images/user.jpg') !!}" alt="user">
      <div class="caption">
        <h3 title="{{ $all_users->email }}">{{$all_users->email}}</h3>
        <p>
        <a href="#" class="btn btn-danger btn-block text-center" role="button">Remove User</a> 
        </p>
      </div>
    </div>
 </div>
 

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