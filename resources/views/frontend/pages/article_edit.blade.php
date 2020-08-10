@extends('frontend.master')
@section('title','| Post A Article')
{{-- @section('top_menu')
        @include('frontend.include.top_menu')
@endsection --}}
{{-- {{dd($post)}} --}}
@section('stylesheet')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
    selector: "textarea",  // change this value according to your HTML
    plugins: "link code image lists imagetools media",
    menubar:false
  });

  </script>
@endsection


@section('maincontent')

<h1>edit articles</h1>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
     <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             
              <h3 class="box-title">Edit Article</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          {{--   {!! Form::open(['url' => '/article_store','files'=>true]) !!} --}}
@foreach($post as $posts)
{!! Form::model($posts,['route' =>['article.update', $posts->slug],'method'=>'PUT','files'=>true]) !!}
            {!! Form::label('title', 'Title');!!}
            {!! Form::text('title',null, [
            "class" =>"form-control",
             
            ]);!!}

         
                @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('title') }} </label>
            @endif

            
                 <a href="#" style="text-decoration:none;" data-container="body" data-toggle="popover" data-placement="top" data-content="
                  1.max latter 120.
                  2. min 30.
                  3. must be required.


                 ">
  Role?
</a>
      
            
            <br />
            

            {!! Form::label('body', 'Description');!!}
            {!! Form::textarea('body',null, [
            "class" =>"form-control",
            
            ]);!!}
            @if($errors->has('body'))
            <label style="color: red"> {{ $errors->first('body') }} </label>
            @endif
            <br>

 {!! Form::label('article_image', 'Article Image');!!}
            {!! Form::file('featured_image');!!}
            
            

@if($posts->image)
                    
                     <img src=" {{ url($posts->image) }}" style="height: 131px; width: 130px;">

                     
                

                @endif 


                @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('article_image') }} </label>
            @endif
            <br />
             <strong> previous selected images </strong>
<br>
 {!! Form::label('select_category', 'Select Category');!!}
  {{Form::select('category_id',$categories,null,
    ['class'=>'form-control selectpicker',
     'data-show-subtext' =>'true',
     'data-live-search' =>'true',
     'required' => 'required'

  ])}}
  <p>previous selected category: <strong>{{$posts->category_id}}</strong></p>
<br>



 <br>
 <br>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            @endforeach
          </div>
          <!-- /.box -->



  </div>
</div>

@endsection

@section('script')
 <script src="{{ URL::asset('frontend-style/js/bootstrap_select2.js')}}"></script>
 
<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

</script>
@endsection

