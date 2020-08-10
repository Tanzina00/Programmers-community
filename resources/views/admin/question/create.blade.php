@extends('admin.master')
@section('title','| Ask a Question')

@section('stylesheet');
{!! Html::style('css/select2.min.css') !!}

 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
    selector: "textarea",  // change this value according to your HTML
    plugins: "link code image lists imagetools",
    menubar:false
  });

  </script>
@endsection


@section('maincontent')

<h1>create new</h1>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
     <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Post a Article</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route' => 'question.store','files'=>true]) !!}

            {!! Form::label('title', 'Title');!!}
            {!! Form::text('title',null, [
            "class" =>"form-control"
             
            ]);!!}
                @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('title') }} </label>
            @endif
            <br />
            

            {!! Form::label('body', 'Description');!!}
            {!! Form::textarea('body',null, [
            "class" =>"form-control"
            ]);!!}
            @if($errors->has('body'))
            <label style="color: red"> {{ $errors->first('body') }} </label>
            @endif
            <br>

 {!! Form::label('question_image', 'question Image');!!}
            {!! Form::file('question_image');!!}
                @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('question_image') }} </label>
            @endif
            <br />


               
                {!! Form::label('tags', 'Tags');!!}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          </select>
 <br>
<br>
  {!! Form::label('select_category', 'Select Category');!!}
 
<select class="form-control select-single" name="category_id">

       @foreach($categories as $category)
     <option value="{{$category->id}}"> {{$category->name}} </option>
@endforeach
          </select>



 <br>
 <br>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->



  </div>
</div>

@endsection

@section('script')
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
   $('.select2-multi').select2();
     $('.select-single').select2();


    
</script>
@endsection