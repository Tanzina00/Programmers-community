 <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('backend-style/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{ url('/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            <span class="pull-right-container">
             {{--  <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
          
        </li>
       
        <li>
          <a href="{{ route('tag.index') }}">
            <i class="fa fa-th"></i> <span>Tag</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
     
     
       {{--  <li class="treeview">
          <a href="{{ route('category.index') }}">
            <i class="fa fa-edit"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        
        </li> --}}
        <li class="treeview">
          <a href="{{ route('question.index') }}">
            <i class="fa fa-table"></i> <span>Question</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
         
        </li>
      <li class="treeview">
          <a href="{{ route('article.index') }}">
            <i class="fa fa-table"></i> <span>Article</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
         
        </li>

 <li class="treeview">
          <a href="{{ url('/admin/groups') }}">
            <i class="fa fa-table"></i> <span>Group</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
         
        </li>


        <li class="treeview">
          <a href="{{url('admin/jobs')}}">
            <i class="fa fa-table"></i> <span>Job Portal</span>
            <span class="pull-right-container">
              {{-- <i class="fa fa-angle-left pull-right"></i> --}}
            </span>
          </a>
         
        </li>

         <li class="treeview">
          <a href="{{ url('admin/allusers') }}">
            <i class="fa fa-table"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-user pull-right"></i>
            </span>
          </a>
         
        </li>
      </ul>