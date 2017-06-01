
<aside class="main-sidebar " style="position : fixed;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php
        if(isset(session('users')['tipo'])){
          $tipo=session('users')['tipo'];
          $user = session('users');

        ?>
        <div class="user-panel">
            <div class="pull-left image">
                @if(file_exists(base_path()."/public/resources/images/".session("users")['dni'].".jpg"))
                    <a href="/informacion"><img src="{{asset('resources/images/').'/'.$user['dni']}}.jpg"   class="img-circle img-sm" alt="User Image"></a>

                @else
                   <a href="/informacion"><img src="{{asset('dist/img/profile.jpg/')}}"   class="img-circle img-sm" alt="User Image"></a>
                @endif
            </div>
            <div class="pull-left info">
                <p style="font-size:10px;"><?=strtoupper(session('users')['nombre'])?></p>
                <a href="#"><i class="fa fa-circle text-success" style=""></i><?=$tipo ?></a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" >
            <li class="header">Menu</li>
            @if($tipo!='cliente')

            <li class="treeview">
                <a href="#">

                    <i class="fa fa-gavel"></i> <span>Procesos</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                <li><a  href="{{URL::asset('procesos/listar')}}" ><i class="fa fa-circle-o"></i> Listar</a></li>
                @if($tipo == "abogado")
                   <li class="active"><a href="{{URL::asset('procesos/registrar')}}" ><i class="fa fa-circle-o"></i>Registrar</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Observaciones</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Citas</a></li>
                @endif
                </ul>
            </li>
            @endif
            @if($tipo=="administrador")

              <li class="treeview">
                  <a href="#">
                      <i class="fa  fa-graduation-cap"></i>
                      <span>Consultas</span>
                      <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{URL::asset('consultas/registrar')}}" ><i class="fa fa-circle-o"></i> Registrar</a></li>
                      <li><a href="{{URL::asset('consultas/listar')}}" ><i class="fa fa-circle-o"></i> Listar</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa  fa-graduation-cap"></i>
                      <span>Abogados</span>
                      <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{URL::asset('abogado/registrar')}}" ><i class="fa fa-circle-o"></i> Registrar</a></li>
                      <li><a href="{{URL::asset('abogado/listar')}}" ><i class="fa fa-circle-o"></i> Listar</a></li>
                  </ul>
              </li>
            @endif
            @if($tipo=="abogado" or $tipo == "administrador")

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Clientes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::asset('cliente/registrar')}}" ><i class="fa fa-circle-o"></i> Registrar</a></li>
                    <li><a href="{{URL::asset('cliente/listar')}}" ><i class="fa fa-circle-o"></i> Listar</a></li>
                </ul>
            </li>
            @else
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Perfil</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{URL::asset('informacion')}}" id="actualizarPerfil"><i class="fa fa-circle-o"></i> Actualizar Perfil</a></li>

                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Proceso</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::asset('procesos/info')}}" ><i class="fa fa-circle-o"></i> Avances de Proceso</a></li>

                </ul>
            </li>

            @endif
              <!--<li><a href="#" onclick="actualizarProceso(46)"><i class="fa fa-circle-o"></i> Avances de Proceso</a></li>-->
        </ul>
        <?php
        }
        ?>
    </section>
    <!-- /.sidebar -->

    <!--<div class=" footer">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <strong>Copyright © 2014-2017 </strong>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
            <span class="hidden-xs">All rights
            reserved.</span>
            </div>

        </div>
    </div>-->
</aside>
