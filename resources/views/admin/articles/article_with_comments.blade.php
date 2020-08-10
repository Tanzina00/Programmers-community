@extends('admin.master')
@section('title','| Question')

@section('maincontent')

	<h1>Comments</h1>	
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title text-center">Article: 
{{ $current_question->title }}
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No:</th>
                  <th>Comments</th>
                  <th>Comments At</th>
                  <th>Comments by</th>
                  
                   <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
             @foreach($all_comments as $all_comment)   
                <tr>
                  <td>{{$i++}}</td>
                  <td title="{{$all_comment->comment}}">
                    {!!str_limit(strip_tags($all_comment->comment),120,'...')!!}
                         <a type="button" class="btn btn-default btn-sm" data-toggle="modal" 
          data-target=".bs-example-modal-lg{{$all_comment->id}}">see more..</a>

<div class="modal fade bs-example-modal-lg{{$all_comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
   

       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ $current_question->title}}</h4>
      </div>
      <div class="modal-body">
        <p>   {!!$all_comment->comment!!} </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                  </td>
                  
                  <td>{{ date('M j, Y',strtotime($all_comment->created_at)) }}</td>
                   <td title="{{$all_comment->email}}">
                     {{$all_comment->name}}
                   </td>
                   
                  <td> 
<p>
          
	        {{--  <button type="button" class="btn btn-success btn-sm">Edit</button> --}}
               {{-- <button type="button" class="btn btn-danger btn-sm">Delete</button> --}}
           
      {{ Form::open(['url'=>['admin/article-comment-delete',$all_comment->id],'method'=>'DELETE']) }}
      {{ Form::submit('Delete',['class'=>"btn btn-danger btn-sm"]) }}
      {{ Form::close() }}
</p>

                  </td>
                   
                </tr>
            @endforeach    
                
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
@endsection