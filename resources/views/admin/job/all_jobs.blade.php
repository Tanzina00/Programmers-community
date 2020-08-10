@extends('admin.master')
@section('title','| Article')

@section('maincontent')

  <h1>{{$current_category}} Jobs lists</h1> 
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
<a href="{{ url('admin/job-create') }}" class="btn btn-primary btn-md">Post A Job</a>
                 
              </h3>

               </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No:</th>
                  <th>Title:</th>
                  <th>Company name</th>
                  <th>body</th>
                  <th>Created At</th>
                  <th>Dead line</th>
                  <th>Posted by</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $i =0?>
                @foreach($alljob as $alljobs)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td title="{{ $alljobs->name }}">{{ $alljobs->name }}</td>

                  <td>{{$alljobs->company_title}}</td>
             <td title="{{ $alljobs->description }}">{!!str_limit(strip_tags($alljobs->description),120,'...')!!}
                  
                              <a type="button" class="btn btn-default btn-sm" data-toggle="modal" 
          data-target=".bs-example-modal-lg{{$alljobs->id}}">see more..</a>

<div class="modal fade bs-example-modal-lg{{$alljobs->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
   

       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">{{$current_category}}</h4>
        <h3> Title: {{ $alljobs->name }}</h3>
      </div>
      <div class="modal-body">
        <p>   {!!$alljobs->description!!} </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                  </td>
                
                 
                
                 
                  <td>{{ date('M j, Y',strtotime($alljobs->created_at)) }}</td>
                   <td>
      @foreach($alluser as $allusers)
       @if($allusers->id == $alljobs->users_id)
           <p title="{{$allusers->email}}">{{$allusers->name}} </p>
       @endif
      @endforeach

                   </td>
                  <td> 
<p>
          
     <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete-category-modal-lg{{$alljobs->id}}">Delete</a>
            </p>
              {{-- Delete Model --}}

<div class="modal fade delete-category-modal-lg{{$alljobs->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Are You Sure To delete this?</h4>
              </div>
           <div class="modal-body">
               
       {{ Form::open(['url'=>['admin/jobs',$alljobs->id],'method'=>'DELETE']) }}
      {{ Form::submit('Delete Jobs',['class'=>"btn btn-danger btn-lg btn-block"]) }}
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
   <span class="text-center">{{$alljob->links() }}</span> 
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