@extends('admin.master')
@section('title','| category')

@section('maincontent')

  <h1>hi welcome</h1> 
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
              <a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target=".bs-example-modal-lg">Add new Category</a>
                 
              </h3>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Create New Category</h4>
              </div>
           <div class="modal-body">
               
     {!! Form::open(['route' => 'category.store']) !!}

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
                  <th>Name:</th>
                  <th>Created At</th>
                   <th>Created By</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($allcategories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ date('M j, Y',strtotime($category->created_at)) }}</td>
                   <td>{{ $category->created_by }}</td>
                   
                  <td> 
<p>
           <a href="{{ route('category.edit',$category->id) }}" type="button" class="btn btn-success btn-sm">Edit</a>

             <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete-category-modal-lg">Delete</a>
            
                 </p>

                  </td>
                   
                </tr>
@endforeach  
                {{-- Delete Model --}}

<div class="modal fade delete-category-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Are You Sure To delete this?</h4>
              </div>
           <div class="modal-body">
               
       {{ Form::open(['route'=>['category.destroy',$category->id],'method'=>'DELETE']) }}
      {{ Form::submit('Delete',['class'=>"btn btn-danger btn-lg btn-block"]) }}
      {{ Form::close() }}

           </div>
          

    </div>
  </div>
</div>

{{-- end Delete Model --}}
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