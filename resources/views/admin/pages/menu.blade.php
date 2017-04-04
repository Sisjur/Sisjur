
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
                @if($tipo=="administrador")
                    <a href="/informacion"><img src="{{asset('dist/img/user1-128x128.jpg/')}}" style="height : 42px;"  class="img-circle" alt="User Image"></a> 
                
                @else
                    <a href="/informacion"><img src="{{asset('resourses/assets/images/').'/'.$user['dni']}}.jpg" style="height : 42px;"  class="img-circle" alt="User Image"></a>
                @endif
            </div>
            <div class="pull-left info">
                <p style="font-size:12px;"><?=strtoupper(session('users')['nombre'])?></p>
                <a href="#"><i class="fa fa-circle text-success"></i><?=$tipo ?></a>
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
                <li><a  href="/procesos/listar" id="listarProcesos"><i class="fa fa-circle-o"></i> Listar</a></li>
                @if($tipo == "abogado")
                   <li class="active"><a href="/procesos/registrar" id="registrarProceso"><i class="fa fa-circle-o"></i>Registrar</a></li>
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
                    <span>Abogados</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/abogado/registrar" id="registrarAbogado"><i class="fa fa-circle-o"></i> Registrar</a></li>
                    <li><a href="/abogado/listar" id="listarAbogado"><i class="fa fa-circle-o"></i> Listar</a></li>
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
                    <li><a href="/cliente/registrar" id="registrarCliente"><i class="fa fa-circle-o"></i> Registrar</a></li>
                    <li><a href="/cliente/listar" id="listarCliente"><i class="fa fa-circle-o"></i> Listar</a></li>
                </ul>
            </li>
            @else
              <li><a href="#" id="actualizarPerfil"><i class="fa fa-circle-o"></i> Actualizar Perfil</a></li>
              <li><a href="#" id="avancesProceso"><i class="fa fa-circle-o"></i> Avances de Proceso</a></li>
            @endif
              <!--<li><a href="#" onclick="actualizarProceso(46)"><i class="fa fa-circle-o"></i> Avances de Proceso</a></li>-->
        </ul>
        <?php
        }
        ?>
    </section>
    <!-- /.sidebar -->
</aside>
