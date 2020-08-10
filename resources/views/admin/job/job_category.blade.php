@extends('admin.master')
@section('title','| Job category')

@section('maincontent')

  <h1>All Category Jobs</h1> 
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
              <a class="btn btn-primary btn-md" data-toggle="modal" data-target=".bs-example-modal-lg">Add new Category</a>
                 
              </h3>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Create New Job Category</h4>
              </div>
           <div class="modal-body">
               
     {!! Form::open(['url' => 'admin/job-category-create']) !!}

             {{ Form::label('title', 'new category')}}
            {{ Form::text('name',null, ["class" =>"form-control"])}}

            @if($errors->has('name'))
            <label style="color: red"> {{ $errors->first('name') }} </label>
            @endif
            <br>
  </div>
          <div class="modal-footer">
               
          {{ Form::submit('Save category',[
                        "class"=>"btn btn-success btn-lg btn-block"
                        ])}}
             {!! Form::close() !!}

                
              </div>        

    </div>
  </div>
</div>

  </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No:</th>
                  <th>Category Name:</th>
                  <th>Total Job</th>
                  <th>Show All Jobs</th>
                  <th>Created At</th>
                   <th>Created By</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $j=1?>
                @foreach($allcategories as $category)
                <tr>
                  <td>{{ $j++ }}</td>
                  <td>
                <span class="label label-success"> {{ $category->name }}
                </span> 
                  </td>
                  
                  <td>
                  <?php $i=0?>
                  @foreach($alljob as $alljobs)
   @if($alljobs->category_id == $category->id)
                        <?php $i++?>
                    @endif
                  @endforeach
                  {{$i}}
                  </td>
                  <td>
                  @if($i !=0)
    <a href="{{ url('admin/jobs',$category->id) }}" type="button" class="btn btn-success btn-sm">Show all Jobs</a>
    @else
 <a  type="button" class="btn btn-success btn-sm" disabled>No Jobs</a>
    @endif
                  </td>
                  <td>{{ date('M j, Y',strtotime($category->created_at)) }}</td>
                   <td>
                  
                {{$category->created_by}}
                   </td>
                 
                  <td> 
<p>
         

             <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete-category-modal-lg{{$category->id}}">Delete</a>
            </p>
              {{-- Delete Model --}}

<div class="modal fade delete-category-modal-lg{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Are You Sure To delete this?</h4>
              </div>
           <div class="modal-body">
               
       {{ Form::open(['url'=>['admin/job-category-delete',$category->id],'method'=>'DELETE']) }}
      {{ Form::submit('Delete Job Category',['class'=>"btn btn-danger btn-lg btn-block"]) }}
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
   <span class="text-center">{{ $allcategories->links() }}</span> 
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