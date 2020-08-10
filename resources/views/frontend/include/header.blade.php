  <!DOCTYPE html>
      <html lang="en">

      <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="tanzina akter">

        <title>
          @yield('title')
        </title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('frontend-style/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--font-awesome CSS -->
        <link href="{{ URL::asset('frontend-style/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
        
        <!--Custom CSS -->
        <link href="{{ URL::asset('frontend-style/css/style.css')}}" rel="stylesheet">
         <link href="{{ URL::asset('frontend-style/css/question.css')}}" rel="stylesheet">
    @yield('stylesheet')
        {{-- <link href="{{ URL::asset('frontend-style/css/job.css')}}" rel="stylesheet"> --}}
       {{--  <link href="{{ URL::asset('frontend-style/css/signin.css')}}" rel="stylesheet">
 --}}
            </head>

            <body >

              <div class="container-fluid">

                <section class="top-nav text-center">
                  <div class="container">
                    <div class="row">
                    <div class="col-md-6 text-left ">                        
                        <a href="{{ url('/') }}" class="navbar-brand">LOGO</a>
                          </div>
                      <div class="col-md-6"> 

<ul class="navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li style="display:inline-block !important;"> <a href="{{ url('/login') }}" style="text-decoration:none;font-size: 16px; color:white;margin-left:10px">
                           login
                         </a> </li>
                           <li style="display:inline-block !important;"> <a href="{{ url('/register') }}" style="text-decoration:none;font-size: 16px; color:white;margin-left:10px">
                           Join Now
                         </a> </li>
                        
                        @else
                            <li class="dropdown">
                                <a href="#" style="color: white;font-size: 17px;text-decoration: none" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                           <ul class="dropdown-menu" role="menu">
                           <li ><a href="{{ url('/profile') }}"> Profile </a></li>
                           <li><a href="#"> Preference</a></li>
                           <li><a href="#"> Setting </a></li>
                           <li><a href="#"> Job Alert </a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>






                          </div>
                    </div>
                    <!-- end of row --> 
                  </div> 
                  <!-- end of container-->    
                </section>
                <!-- end of top nav -->

          
