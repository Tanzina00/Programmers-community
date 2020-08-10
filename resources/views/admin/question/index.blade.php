@extends('admin.master')
@section('title','| Question')

@section('maincontent')

  <h1>All Question lists</h1> 
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
<a href="{{ route('article.create') }}" class="btn btn-primary btn-md">Post A Article</a>
                 
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No:</th>
                  <th>Title:</th>
                  <th>body</th>
                  <th>Total Comments</th>
                  <th>Tags</th>
                  <th>Total view</th>
                  <th>Created At</th>
                  <th>Posted by</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $i =0?>
                @foreach($allarticle as $allarticles)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td title="{{ $allarticles->title }}">{{ $allarticles->title }}</td>
                  <td title="{{ $allarticles->body }}">{!!str_limit(strip_tags($allarticles->body),120,'...')!!}
                  
                              <a type="button" class="btn btn-default btn-sm" data-toggle="modal" 
          data-target=".bs-example-modal-lg{{$allarticles->id}}">see more..</a>

<div class="modal fade bs-example-modal-lg{{$allarticles->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
   

       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ $allarticles->category_id }}</h4>
      </div>
      <div class="modal-body">
        <p>   {!!$allarticles->body!!} </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td class="text-center">
                  <?php $j=0 ?>
               @foreach($all_comments as $all_comment)
                 @if($all_comment->question_id == $allarticles->id)
                 <?php $j++ ?>
                 @endif
               @endforeach
           <span class="label label-danger text-center"> {{$j}} </span> <br> 
                    @if($j == 0)
<a type="button" disabled class="btn btn-success btn-sm">No Comments</a> 
@else
<a type="button" href="{{ url('admin/question-comments',$allarticles->id) }}" class="btn btn-success btn-sm">Show All Comments</a> 
 @endif       
          
                   </td>

                   <td style="color: black !important">
                   @foreach($all_question_tag as $all_question_tags)
                   @if($all_question_tags->question_id == $allarticles->id)
                     <span class="label label-warning">
                       {{$all_question_tags->tag_id}} 
                     </span>
                        <br>
                    @endif
                
                   @endforeach
                   </td>
                   <td class="text-center"> 
                   <span class="label label-danger">
                         {{ $allarticles->total_view }}
                    </span>     
                     </td>
                
                 
                  <td>{{ date('M j, Y',strtotime($allarticles->created_at)) }}</td>
                   <td>
      @foreach($alluser as $allusers)
       @if($allusers->id == $allarticles->user_id)
           <p title="{{$allusers->email}}">{{$allusers->name}} </p>
       @endif
      @endforeach

                   </td>
                  <td> 
<p>
          
          {{--  <button type="button" class="btn btn-success btn-sm">Edit</button> --}}
               <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete-category-modal-lg{{$allarticles->id}}">Delete</a>
</p>


  {{-- Delete Model --}}

<div class="modal fade delete-category-modal-lg{{$allarticles->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Are You Sure To delete this?</h4>
              </div>
           <div class="modal-body">
               
       {{ Form::open(['url'=>['admin/question',$allarticles->id],'method'=>'DELETE']) }}
      {{ Form::submit('Delete',['class'=>"btn btn-danger btn-lg btn-block"]) }}
      {{ Form::close() }}

           </div>
          

    </div>
  </div>
</div>

{{-- end Delete Model --}}



                  </td>
                   
                </tr>
             @endforeach   
                
                </tbody>
               
              </table>
                   <div class="row">
<div class="col-md-12 text-center">
   <span class="text-center">{{$allarticle->links() }}</span> 
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