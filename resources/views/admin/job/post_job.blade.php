@extends('admin.master')
@section('title','| Post a Job')
@section('maincontent')
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
     selector: "textarea",
          menubar: false,
          plugins: "advlist , lists",
          toolbar: 'undo redo | bold italic| bullist numlist',
  });

  </script>



      <div class="panel panel-primary">
          <div class="title">
            <h2>Post a Job</h2>
            </div>
        <div class="panel-body text-left">
         
          <div class="first-item"  id="first-item" >
            <div class="form-group p-title ">
            <h2 class="text-left">Getting Started</h2>
            </div>
          
 {!! Form::open(['url' => '/job']) !!}

<div class="form-group">
    <label for="exampleInputEmail1">Job Title</label>
    <input type="text" class="form-control" name="name" style="height: 50px;" id="exampleInputEmail1">
     @if($errors->has('name'))
            <label style="color: red"> {{ $errors->first('name') }} </label>
            @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Company Title</label>
    <input type="text" name="company_title" class="form-control" id="exampleInputPassword1">
    @if($errors->has('company_title'))
            <label style="color: red"> {{ $errors->first('company_title') }} </label>
            @endif
  </div>
<div class="form-group">
    <label for="exampleInputEmail1">Category</label> <br>
    <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="category_id">
<option></option>
       @foreach($job_categories as $job_category)
     <option value="{{$job_category->id}}"> {{$job_category->name}} </option>
@endforeach
          </select>
          @if($errors->has('category_id'))
            <label style="color: red"> {{ $errors->first('category_id') }} </label>
            @endif
  </div>
<div class="form-group">
    <label for="exampleInputEmail1">Location</label> <br>
    <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="location_name">
<option></option>
       @foreach($location as $locations)
     <option value="{{$locations->name}}"> {{$locations->name}} </option>
@endforeach
          </select>
           @if($errors->has('location_name'))
            <label style="color: red"> {{ $errors->first('location_name') }} </label>
            @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Applications for this job will be sent to the following email address(es):</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1">
   @if($errors->has('email'))
            <label style="color: red"> {{ $errors->first('email') }} </label>
            @endif

  </div>

<div class="form-group">
	 <label for="exampleInputPassword1">What type of job is it? (optional):</label> <br>
 <label class="radio-inline">
  <input type="radio" name="jobs_type" id="inlineRadio1" value="Part Time"> Part Time
</label>
<label class="radio-inline">
  <input type="radio" name="jobs_type" id="inlineRadio2" value="Full Time">Full Time
</label>
<label class="radio-inline">
  <input type="radio" name="jobs_type" id="inlineRadio3" value="Temporary"> Contract
</label>
<br>
  @if($errors->has('jobs_type'))
            <label style="color: red"> {{ $errors->first('jobs_type') }} </label>
            @endif
</div>
 <div class="form-group one-range">
    <label class="control-label" for="exampleInputAmount">What is the salary for this job? (optional)</label>
    <div class="input-group">
      <div class="input-group-addon">$</div>
      <input type="text" name="salary1" class="form-control salary_value_empty" placeholder="e.g. 40, 000.00">
           @if($errors->has('salary1'))
            <label style="color: red"> {{ $errors->first('salary1') }} </label>
            @endif
    </div>
        <select class="form-control" name="duration" style="width:15% !important ">
  <option value="per year">Per Year</option>
  <option value="per day">Per Day</option>
  <option value="per week">Per Week</option>
  <option value="per month">Per MOnth</option>
</select>
<a id="add-range" class="add_field_button" ><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Salary Range</a>
    </div>
  <div class="form-group salary-range" style="display: none !important">
     <label class="control-label" for="exampleInputAmount">What is the salary for this job? (optional)</label>
    <div class="input-group">
      <div class="input-group-addon">$</div>
      <input type="text" name="salary2" class="form-control back_value_empty"  placeholder="e.g. 40, 000.00">
       @if($errors->has('salary2'))
            <label style="color: red"> {{ $errors->first('salary2') }} </label>
            @endif
    </div>
    <div class="input-group srange">
      <div class="input-group-addon">to</div>
      <input type="text" name="salary3" class="form-control back_value_empty"  placeholder="e.g. 70, 000.00">
    @if($errors->has('salary3'))
            <label style="color: red"> {{ $errors->first('salary3') }} </label>
            @endif
    </div>
    <select class="form-control" name="duration" style="width:15% !important">

  <option value="per year">Per Year</option>
  <option value="per day">Per Day</option>
  <option value="per week">Per Week</option>
  <option value="per month">Per MOnth</option>
</select>
<a id="back-one-range" class="add_field_button"><i class="fa fa-plus-circle" aria-hidden="true"></i>Back One Range</a>
@if($errors->has('duration'))
            <label style="color: red"> {{ $errors->first('duration') }} </label>
            @endif
    </div> 

  {!! Form::label('Qualification', 'Academic Qualification');!!}
            {!! Form::textarea('qualification',null, [
            "class" =>"form-control",
            "rows"=>"3"
            ]);!!}
            @if($errors->has('qualification'))
            <label style="color: red"> {{ $errors->first('qualification') }} </label>
            @endif
            <br>

  {!! Form::label('skill', 'Skills and Experience - essential');!!}
            {!! Form::textarea('skill',null, [
            "class" =>"form-control",
            "rows"=>"3"
            ]);!!}
            @if($errors->has('skill'))
            <label style="color: red"> {{ $errors->first('skill') }} </label>
            @endif
            <br>
 {!! Form::label('activities', 'activities');!!}
            {!! Form::textarea('activities',null, [
            "class" =>"form-control",
            "rows"=>"3"
            ]);!!}
            @if($errors->has('activities'))
            <label style="color: red"> {{ $errors->first('activities') }} </label>
            @endif
            <br>


  {!! Form::label('binifit', 'Binefits');!!}
            {!! Form::textarea('binefits',null, [
            "class" =>"form-control",
            "rows"=>"3"
            ]);!!}
            @if($errors->has('binefits'))
            <label style="color: red"> {{ $errors->first('binefits') }} </label>
            @endif
            <br>

              {!! Form::label('body', 'Description');!!}
            {!! Form::textarea('description',null, [
            "class" =>"form-control",
            "rows"=>"7"
            ]);!!}
            @if($errors->has('description'))
            <label style="color: red"> {{ $errors->first('description') }} </label>
            @endif
            <br>

<div class="form-group">
    <label for="exampleInputEmail1">Dedline</label>
    <input type="text" class="form-control" id="datepicker" name="dedline">
    @if($errors->has('dedline'))
            <label style="color: red"> {{ $errors->first('dedline') }} </label>
            @endif
  </div>






<button type="submit">save</button>
















            </form>
            </div>
         

        </div>
      </div>


<script src="{{ asset('backend-style/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


<script type="text/javascript">
   $( function() {
    $( "#add-range" ).click(
function(){
  $(".salary_value_empty").val('');
 $( ".one-range" ).hide();
$( ".salary-range" ).show();

});   
  $("#back-one-range").click(
    function(){
    $(".back_value_empty").val('');
 $( ".one-range" ).show();
$( ".salary-range" ).hide();

}); 
 });
</script>
@endsection

   

   