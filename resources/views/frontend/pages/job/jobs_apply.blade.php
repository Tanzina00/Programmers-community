@extends('frontend.master')
@section('title','| The Job')
{{-- @section('top_menu')
        @include('frontend.include.top_menu')
@endsection --}}
@section('asksection')
{!! Html::style('frontend-style/css/job.css') !!}
{!! Html::style('frontend-style/css/details.css') !!}

        @include('frontend.include.the_job')
        @include('frontend.include.job_menu')
@endsection

@section('maincontent')


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header title">
        
        <h3 class="text-center" id="">Apply for Business Development Manager</h3>
      </div>
      <div class="modal-body">
      <p class="pre-text">Already uploaded your CV?<a href="">Sign in</a>  to apply instantly</p>
 <form action="{{url('/jobs-apply',$current_job->id)}}" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
<div class="bottom-border">
  
  <div class="form-group">
    <label for="email1">To:</label>
    <input type="email" value="{{ $current_job->email }}" readonly="readonly" required name="email" class="form-control" id="email1" title="can not add new">
      @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('email') }} </label>
            @endif
  </div>

 <div class="form-group">
    <label for="email1">Subject:</label>
    <input type="text" name="subject" class="form-control">
      @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('subject') }} </label>
            @endif
  </div>

</div>
<div class="bottom-border title">
<h3>Upload your CV</h3>
  <div class="form-group">
    <label for="fileinput">Upload from your computer</label>
    <input type="file" name="a_file" id="fileinput">
    
      @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('a_file') }} </label>
            @endif
  </div>
  <p>Your CV must be a .doc, .pdf, .docx, .rtf, and no bigger than 1MB</p>
  </div>
  <div class="form-group">
    <label>
     Your covering message for Business Development Manager
    </label>
    <textarea class="form-control" name="message" rows="3" placeholder="write your application covering message here or copy and paste from a document"></textarea>
    <p class="character text-right">4000 characters left</p>
      @if(count($errors) > 0)
            <label style="color: red"> {{ $errors->first('message') }} </label>
            @endif
  </div>
 {{--  <div class="checkbox">
    <label>
      <input type="checkbox"> Allow recruiters to find my CV in the CV database
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Email me jobs like this one when they become available
    </label>
  </div> --}}
  <div class="terms">
    <p>
      By applying for a job listed on Jobs you agree to our <a>terms and conditions</a> and <a>privacy policy</a>. You should never be required to provide bank account details. If you are, please <a>email us</a>.
    </p>
  </div>
  <button type="submit" class="btn btn-default-e">Send Application</button>
</form>
      </div>
    </div>
 @endsection
