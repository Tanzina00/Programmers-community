@extends('admin.master')
@section('title','| All Group Posts')

@section('maincontent')

	<h1>group</h1>	
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title text-center">
 Show  all Comments
                 
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body ">
           @if(!$allgroup_post_comments->isEmpty())
              <table id="example2" class="table table-bordered table-hover">

                <thead>
                <tr>
                  <th>No:</th>
                  <th>Description short:</th>
                  <th>Desc. full:</th>
                  <th>Comments At</th>
                  <th>Comments by</th>
                   <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                
                <?php $i=1; ?>
                @foreach($allgroup_post_comments as $allgroup_post_comment)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td title="{!!$allgroup_post_comment->comment!!}">
                  {!!str_limit(strip_tags($allgroup_post_comment->comment),150,'...')!!}
                  {{-- {!!$allgroups->body!!} --}}
                 </td>
                  <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" 
          data-target=".bs-example-modal-lg{{$allgroup_post_comment->id}}">Show</button>

<div class="modal fade bs-example-modal-lg{{$allgroup_post_comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
   

       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Show all Comments</h4>
      </div>
      <div class="modal-body">
        <p>   {!!$allgroup_post_comment->comment!!} </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td>{{ date('M j, Y',strtotime($allgroup_post_comment->created_at)) }}</td>
                  
                    <td title="{{ $allgroup_post_comment->email }}">{{ $allgroup_post_comment->name }}</td>
                  

                  

                  
                   {{-- <td>
                   <a href="#"><span class="label label-primary">Pending</span></a>
                   <a href="#"><span class="label label-success">Active</span> </a>
                   
                   </td> --}}
                  <td> 
<p>
           
	         <a type="button" href="{{ url('admin/edit',$allgroup_post_comment->id) }}" class="btn btn-success btn-sm">Edit</a>
        


           
      {{ Form::open(['url'=>['admin/delete-group-post-comments',
      $allgroup_post_comment->id],'method'=>'DELETE']) }}
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
   <span class="text-center">{{ $allgroup_post_comments->links() }}</span> 
</div>
    
</div>
@else
           <h1>there have no  comments</h1>    
         @endif  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
@endsection