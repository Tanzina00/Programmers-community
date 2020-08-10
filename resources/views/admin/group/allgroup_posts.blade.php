@extends('admin.master')
@section('title','| All Group Posts')

@section('maincontent')

	<h1>group</h1>	
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title text-center">
 Show  {{ $currentgroup }} all Posts
                 
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body ">
           @if(!$allgroup_posts->isEmpty())
              <table id="example2" class="table table-bordered table-hover">

                <thead>
                <tr>
                  <th>No:</th>
                  <th>Description short:</th>
                  <th>Total Comments</th>
                  <th>Created At</th>
                  <th>Posted by</th>
                   <th>Show AllComments</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                
                <?php $i=1; ?>
                @foreach($allgroup_posts as $allgroups)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td title="{{ $allgroups->body }}">
                  {!!str_limit(strip_tags($allgroups->body),150,'...')!!}
                       <a type="button" class="btn btn-sm btn-default" data-toggle="modal" 
          data-target=".bs-example-modal-lg{{$allgroups->id}}">Show</a>

<div class="modal fade bs-example-modal-lg{{$allgroups->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
   

       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ $currentgroup }}</h4>
      </div>
      <div class="modal-body">
        <p>   {!!$allgroups->body!!} </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                 </td>
         <td>
         <?php $j=0; ?>
     @foreach($allgroup_post_comments as $allgroup_post_comment)
                   @if($allgroup_post_comment->posts_id == $allgroups->id)
                     <?php $j++?>
                   @endif 
       @endforeach     
       ({{$j}})  </td>


                  
                  <td>{{ date('M j, Y',strtotime($allgroups->created_at)) }}</td>
                  @foreach($alluser as $allusers)
                   @if($allusers->id == $allgroups->user_id)
                    <td title="{{ $allusers->email }}">{{ $allusers->name }}</td>
                   @endif 
                  @endforeach

                   <td>
                        <a type="button" href="{{ url('admin/group-comments',$allgroups->id) }}" class="btn btn-primary btn-sm">Show All Comments</a>
                  </td> 

                  
                   {{-- <td>
                   <a href="#"><span class="label label-primary">Pending</span></a>
                   <a href="#"><span class="label label-success">Active</span> </a>
                   
                   </td> --}}
                  <td> 
<p>
           
	         <a type="button" href="{{ url('admin/edit',$allgroups->id) }}" class="btn btn-success btn-sm">Edit</a>
        


{{ Form::open(['url'=>['admin/delete-group-posts',$allgroups->id],'method'=>'DELETE']) }}

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
   <span class="text-center">{{ $allgroup_posts->links() }}</span> 
</div>
    
</div>
@else
           <h1>there have no {{ $currentgroup }} posts</h1>    
         @endif  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
@endsection