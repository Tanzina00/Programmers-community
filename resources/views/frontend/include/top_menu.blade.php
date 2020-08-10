  <section class="top-second-nav text-center">
                  <div class="container">
                    <div class="row">
                    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
          <li> <a href="{{ url('/question') }}"> Question </a> </li>
          

           <li> <a href="{{ url('/article') }}"> Article </a> </li>
          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Groups <span class="caret"></span></a>
          <ul class="dropdown-menu">

             @if (Auth::guest())
              <li><a href="{{url('/group-search')}}">Search Group</a></li>
              <li><a href="{{url('/group')}}">Create Group</a></li>
             @else

     @if(!empty($group))
{{-- 
    {{ dd($group)}} --}}
             @foreach($group as $groups)
                   <li title="{{ App\Group::find($groups->group_id)->name}}">
                   <a href="{{ url('/groups',$groups->group_id) }}">
                  {{-- {{ str_limit($groups->name,10,'...')   }} --}}
                    {{App\Group::find($groups->group_id)->name}}
                   </a>
                   </li>
                  @endforeach
                  @endif
                 <li><a href="{{url('/group-search')}}">Search Group</a></li>
              <li><a href="{{url('/group')}}">Create Group</a></li>
                  @endif
      
           
           
          </ul>
        </li>
         <li> <a href="{{ url('/jobs') }}">Jobs </a> </li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control empty" placeholder="  &#xf002;&#9;Search for articles, post....   ">
        </div>
        
      </form>
      
    </div><!-- /.navbar-collapse -->
                    </div>
                    <!-- end of row --> 
                  </div> 
                  <!-- end of container-->    
                </section>
                <!-- end of top second nav -->