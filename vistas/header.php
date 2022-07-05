
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panaderia Eben Ezer</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

  <!--Datatables-->
  <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../public/datatables/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../public/datatables/responsive.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">


  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Eben</b> Ezer</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Panadería Eben Ezer</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"> La dueña </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      La dueña
                      <small>Administrador</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li>
              <a href="index.php">
                <i class="fa fa-tasks"></i> <span>Inicio</span>
              </a>
            </li>            
            <li class="treeview">
              <a href="">
                <i class="fa fa-archive"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="producto.php"><i class="fa fa-circle-o"></i>Productos</a></li>
                <li><a href="rubro.php"><i class="fa fa-circle-o"></i>Rubros</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="compra.php"><i class="fa fa-circle-o"></i>Iniciar Compra</a></li>
                <li><a href="proveedor.php"><i class="fa fa-circle-o"></i>Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="venta.php"><i class="fa fa-circle-o"></i>Iniciar Ventas</a></li>
                <li><a href="cliente.php"><i class="fa fa-circle-o"></i>Clientes</a></li>
              </ul>
            </li>                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-industry"></i> <span>Produccion</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ingresoCuadra.php"><i class="fa fa-circle-o"></i>Ingreso Diario</a></li>
                <li><a href="produccionCuadra.php"><i class="fa fa-circle-o"></i>Produccion Diaria</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i> <span>Reparto</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="repartoNuevo.php"><i class="fa fa-circle-o"></i>Iniciar Reparto</a></li>
                <li><a href="repartoFinalizar.php"><i class="fa fa-circle-o"></i>Finalizar Reparto</a></li>                  
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i>Usuarios</a></li>    
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i>Permisos</a></li>             
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-pie-chart"></i> <span>Informes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="informe.php"><i class="fa fa-circle-o"></i>Generar Informe</a></li>            
              </ul>
            </li>       
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

