<?php (session_status() == PHP_SESSION_NONE)?session_start():null; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal GOLD</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/portal/res/lte/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/datatables/dataTables.bootstrap4.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/portal/res/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.min.css" />

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          <span>
            <?php echo (isset($_SESSION))?$_SESSION["name"]:'N/A'; ?>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Informações do Usuário</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-user mr-2"></i>Nome: 
            <span class="float-right text-muted text-sm"><?php echo $_SESSION["name"] . ' ' . $_SESSION["surname"]; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i>Perfil: 
            <span class="float-right text-muted text-sm"><?php echo $_SESSION["usertype"]; ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/portal/classes/controllers/login_controller.php?action=logout" class="dropdown-item dropdown-footer btn btn-primary">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/portal/classes/controllers/dashboard_controller.php" class="brand-link">
      <img src="/portal/res/lte/dist/img/AdminLTELogo.png" alt="PORTAL" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Portal Gold</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php

          //var_dump($_SESSION);

          $profile = $_SESSION["user_type_id"];
          /*
                USER TYPES
                3 - Acesso Total (Presidencia/TI)
                4 - Operacional
                5 - RH
                6 - Marketing
                7 - Treinamento
                9 - Outros (Somente tickets)

           */
          // Presidencia ou RH
          if ($profile == 3 || $profile == 5) {
          ?>
          <li class="nav-header">RECURSOS HUMANOS</li>
          <li class="nav-item has-treeview">
              <li class="nav-item">
                  <a href="https://goldvirtual.com.br/tickets/scp"  target="_blank" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Tickets - Módulo STAFF</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="https://goldvirtual.com.br/webmail"  target="_blank" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Webmail</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="https://drive.google.com/drive/u/0/folders/0B9fimXZc2XV2T2dRTFZFZEd4RHM"  target="_blank" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Drive RH</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/portal/classes/controllers/candidate_controller.php" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Gestão de Candidatos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/portal/classes/controllers/aspirant_controller.php" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Gestão de Aspirantes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/portal/classes/controllers/pilot_controller.php" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Gestão de Pilotos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/portal/classes/controllers/dismissed_controller.php" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Gestão de Demitidos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/portal/classes/controllers/removal_controller.php" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Gestão de Afastamentos</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="/portal/classes/controllers/vampireps_controller.php" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Gestão de Performance</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/portal/classes/controllers/notam_controller.php" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Gestão de NOTAM</p>
                  </a>
              </li>

          <?php } ?>
          </li>

          <?php
          // Presidencia ou Diretoria Operacional
          if ($profile == 3 || $profile == 4 ) {
          ?>
          <li class="nav-header">OPERACIONAL</li>
          <li class="nav-item has-treeview">
              <li class="nav-item">
                  <a href="https://goldvirtual.com.br/tickets/scp"  target="_blank" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Tickets - Módulo STAFF</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="https://goldvirtual.com.br/webmail"  target="_blank" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Webmail</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="https://drive.google.com/drive/u/0/folders/0B9fimXZc2XV2YWNKeWhBUlgzN28"  target="_blank" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Drive Operacional</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/portal/classes/controllers/fleetTypes_controller.php" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Gestão da Frota</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="/portal/classes/controllers/fleet_controller.php" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Gestão da Aeronaves</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="/portal/classes/controllers/route_controller.php" class="nav-link">
                  <i class="fa fa-arrow-right nav-icon"></i>
                  <p>Gestão de Rotas</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="/portal/classes/controllers/hub_controller.php" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Gestão de Hubs</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/portal/classes/controllers/tours_controller.php" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Gestão de Tours</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/portal/classes/controllers/eventos_controller.php" class="nav-link">
                      <i class="fa fa-arrow-right nav-icon"></i>
                      <p>Gestão de Eventos</p>
                  </a>
              </li>
          </li>
            <?php } ?>
            <?php
            // Treinamento
            if ($profile == 3 || $profile == 7) {
            ?>
            <li class="nav-header">TREINAMENTO E CHECK</li>
                <li class="nav-item has-treeview">
                <li class="nav-item">
                    <a href="https://goldvirtual.com.br/tickets/scp"  target="_blank" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Tickets - Módulo STAFF</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://goldvirtual.com.br/webmail"  target="_blank" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Webmail</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://drive.google.com/drive/u/0/folders/0B9fimXZc2XV2S0p6QVVpYUdaeDA"  target="_blank" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Drive Treinamento</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/portal/classes/controllers/training_Area_controller.php" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Áreas de Treinamento</p>
                    </a>
                </li>

                </li>

            <?php } ?>
            <?php
            //Marketing
            if ($profile == 3 || $profile == 6) {
                ?>
                <li class="nav-header">MARKETING</li>
                <li class="nav-item has-treeview">
                <li class="nav-item">
                    <a href="https://goldvirtual.com.br/webmail"  target="_blank" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Webmail</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://drive.google.com/drive/u/0/folders/0B9fimXZc2XV2SUlqbzE4SnhyZ1E"  target="_blank" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Drive Marketing</p>
                    </a>
                </li>
                </li>
            <?php } ?>

            <?php
            // Outros
            if ($profile == 3 || $profile == 9) {
                ?>

            <?php } ?>

            <?php
            if ($profile == 3) {
            ?>
            <li class="nav-header">PRESIDÊNCIA</li>
            <li class="nav-item has-treeview">
            <li class="nav-item">
                <a href="/portal/classes/controllers/fotogold_controller.php" class="nav-link">
                    <i class="fa fa-arrow-right nav-icon"></i>
                    <p>Vencedor FotoGold</p>
                </a>
            </li>
            <li class="nav-item">
                    <a href="/portal/classes/controllers/banner_controller.php" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Banner do Site</p>
                    </a>
            </li>

            <?php } ?>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
