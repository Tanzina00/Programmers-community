@extends('frontend.master')
@section('title','| Please Sign in')

@section('maincontent')
 <link href="{{ URL::asset('frontend-style/css/signin.css')}}" rel="stylesheet">

<div class="panel panel-primary">
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
            <div class="form-group">
              <h2>Create account</h2>
            </div>

               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>

                           
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                           
                        </div>


      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>


                        
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>

                           
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                     <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                             
                        </div>
                        

          <div class="form-group">
              <button type="submit"  class="btn btn-info btn-block">Create your account</button>
            </div>
            <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and<a href="#"> Services</a>.</p>
            <hr>
            <p>Already have an account? <a href="#">Sign in</a></p>
                    </form>
                </div>
            </div>
     
@endsection
