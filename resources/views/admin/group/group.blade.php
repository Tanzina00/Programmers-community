@extends('admin.master')
@section('title','| Group')

@section('maincontent')

	<h1>group</h1>	
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
group managment
                 
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No:</th>
                  <th>Name:</th>
                  <th>Total Posts:</th>
                  <th>Created At</th>
                  <th>Posted by</th>
                   <th>Show Posts</th>
                   <th>Manage User</th>
                   <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($allgroup as $allgroups)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td title="{{ $allgroups->name }}">
                  {{ $allgroups->name }}
                            
                  </td>
                  <td><?php $j=0; ?>
     @foreach($allgroup_posts as $allgroup_post)
                   @if($allgroup_post->group_id == $allgroups->id)
                     <?php $j++?>
                   @endif 
       @endforeach     
       ({{$j}})  </td>
                  <td>{{ date('M j, Y',strtotime($allgroups->created_at)) }}</td>
                  @foreach($alluser as $allusers)
                   @if($allusers->id == $allgroups->users_id)
                    <td title="{{ $allusers->email }}">{{ $allusers->name }}</td>
                   @endif 
                  @endforeach

                   <td>
                   @if($j == 0)
                        <a type="button" disabled class="btn btn-primary btn-sm">Show All Posts</a>
                   @else
                     <a type="button" href="{{ url('admin/groups',$allgroups->id) }}" class="btn btn-primary btn-sm">Show All Posts</a>
                   @endif     
                  </td> 

                  <td>
    <a type="button" href="{{ url('admin/group-users',$allgroups->id) }}" class="btn btn-default btn-sm">Manage User</a>
                  </td>
                   {{-- <td>
                   <a href="#"><span class="label label-primary">Pending</span></a>
                   <a href="#"><span class="label label-success">Active</span> </a>
                   
                   </td> --}}
                  <td> 
<p>
           
	         <a type="button" href="{{ url('admin/edit',$allgroups->id) }}" class="btn btn-success btn-sm">Edit</a>
          
           
      {{ Form::open(['url'=>['admin/groups',$allgroups->id],'method'=>'DELETE']) }}
      {{ Form::submit('Delete',['class'=>"btn btn-danger btn-sm"]) }}
      {{ Form::close() }}
</p>

                  </td>
                   
                </tr>
           @endforeach     
                
                </tbody>
               
              </table>
              <div class="row">
<div class="col-md-12 text-center">
   <span class="text-center">{{ $allgroup->links() }}</span> 
</div>
    
</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
@endsection