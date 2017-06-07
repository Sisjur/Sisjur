<header class="main-header" style="position : fixed;">
  <!-- Logo -->
  <a href="{{URL::asset('/')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels --><span class="logo-mini"><strong>S</strong>SJ</span>
    <!-- logo for regular state and mobile devices --><strong>SISJUR</strong><br>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-fixed-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        @if(session('users')['tipo']!='administrador')
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="margin-right:30px">
            <i class="fa fa-bell-o"></i>
            <span id="cantidadObservacion_poput" class="label label-success"></span>
          </a>
          <ul id="observacion_poput" class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <!-- start message -->
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Support Team
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <!-- end message -->
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{URL::asset('dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      AdminLTE Design Team
                      <small><i class="fa fa-clock-o"></i> 2 hours</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{URL::asset('dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Developers
                      <small><i class="fa fa-clock-o"></i> Today</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{URL::asset('dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Sales Department
                      <small><i class="fa fa-clock-o"></i> Yesterday</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{URL::asset('dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Reviewers
                      <small><i class="fa fa-clock-o"></i> 2 days</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        @endif



        <!-- Notifications: style can be found in dropdown.less -->

        <!-- Tasks: style can be found in dropdown.less -->

        <li>
          <a href="#" style="padding:5px"><img width="150	" src="{{URL::asset('dist/img/logo-nuevo-horizontal.png')}}"></a>
        </li>
        <li>
          <a href="{{URL::asset('salir')}}"><i class="fa fa-power-off"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
