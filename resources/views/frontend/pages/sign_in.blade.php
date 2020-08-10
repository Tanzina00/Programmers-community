@extends('frontend.master')
@section('title','| Welcome to my site')

@section('top_menu')
        @include('frontend.include.top_menu')
@endsection

@section('maincontent')

@section('maincontent')

 <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST" action="#" role="form">
            <div class="form-group">
              <h2>Create account</h2>
            </div>
            <div class="form-group">
              <label class="control-label" for="signupName">Your name</label>
              <input id="signupName" required type="text" maxlength="50" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupEmail">Email</label>
              <input id="signupEmail" required type="email" maxlength="50" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupEmailagain">Confirm Email</label>
              <input id="signupEmailagain" required type="email" maxlength="50" class="form-control">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupPassword">Password</label>
              <input id="signupPassword" required type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupPasswordagain">Confirm Password</label>
              <input id="signupPasswordagain" required type="password" maxlength="25" class="form-control">
            </div>
            <div class="form-group">
              <button id="signupSubmit" type="submit"  class="btn btn-info btn-block">Create your account</button>
            </div>
            <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and<a href="#"> Services</a>.</p>
            <hr>
            <p>Already have an account? <a href="#">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
@endsection