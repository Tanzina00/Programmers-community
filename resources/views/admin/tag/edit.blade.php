@extends('admin.master')
@section('title','| Edit Blog')
@section('maincontent')

<div class="container">
    <div class="row">
        {!! Form::model($tag,['route' =>['tag.update', $tag->id],'method'=>'PUT']) !!}

   <div class="col-md-8">
            {{ Form::label('name', 'Name: ')}}
     {{ Form::text('name',null, ["class" =>"form-control"])}}
              
          
     {{ Form::submit('Save Changes', ["class" =>"btn btn-success","style"=>"margin-top:20px"])}}
      </div>
       
        {!! Form::close() !!}

    </div>



</div>


@endsection 



