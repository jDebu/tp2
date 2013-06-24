<!DOCTYPE html>

<?php
header('Content-Type: text/html;charset=utf-8');
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
} else {
    

    include 'Conexion/cn.php';
    include 'Modelos/profesor.class.php';
    include 'Modelos/laboratorio.class.php';
    include 'Modelos/curso.class.php';
    include "vistas/formularioRegistros.php";

    $l = new laboratorio();
    $r = $l->obtener();
    ?>
    <html>
        <head>
            <title>Sisconlab v 1.2</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Jquery UI-->

            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link href="css/estilo.css" rel="stylesheet" media="screen">

            <link href="js/jquery-ui-1.10.3.custom/css/custom-theme/jquery-ui-1.10.3.custom.css" rel="stylesheet">

            <script src="js/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
            <script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
            <script src="js/js_sisconlab.js"></script>

        </head>
        <body>
            <div id="header" class="navbar navbar-inverse" style="margin: 0 0 0 0;">
                <div class="navbar-inner">
                    <a class="brand" href="#"onclick="location.reload()">SISCONLAB</a>
                    <ul class="nav" role="navigation">

                        <li class="dropdown">
                            <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Laboratorios <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                <?php
                                while ($row = $r->getRow()) {
                                    ?>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#" onclick="asignarHorario(<?php echo$row["id_labo"]; ?>, '<?php echo$row["laboratorio_nombre"]; ?>')"><?php echo$row["laboratorio_nombre"]; ?></a></li> 
                                    <?php
                                }
                                ?>

                            </ul>
                        </li>
    
                        <li class="dropdown">
                            <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Consulta <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="consulta(1)">Por Profesor</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="consulta(2)">Por Materia</a></li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Notificaciones <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                               
                                <?php if ($_SESSION["usuario"]=="admin"): ?>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="abrirNotificaciones()">Revisar Mensajes</a></li>
                                <?php else: ?>
                                 <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="ventanaNotificar()">Notificar Recuperacion</a></li>
                                 <?php endif ?> 
                            </ul>
                        </li>
    <?php if ($_SESSION["usuario"]=="admin"): ?>
                        <li class="dropdown">
                            <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Modificar <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="">Laboratorio</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="">Profesor</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="">Curso</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="">Grupo</a></li>
                            </ul>
                        </li>
    <?php endif ?> 

                    </ul>

                    <ul class="nav" style="float: right;">
                        <li style="color: #999; margin-top: 10px;"><i class="icon-user icon-white"></i> 
                            <?php echo $_SESSION["usuario"]; ?></li>
                        <li><a class="" href="#" onclick="location.href='Controladores/cerrarSesion.php'">Cerrar Sesion</a></li>
                    </ul>
                    <!--<form class="navbar-search pull-right">
                        <input type="text" class="search-query" placeholder="Busqueda">
                    </form>-->
                </div>
            </div>

            <div class="row">

                <h2 id="titulo" align="center">SISTEMA DE CONTROL DE LABORATORIOS</h2>
                 <!--  <h3 align="center">  <?php echo $_SESSION["user_id"]; ?>  </h3>   -->
            </div>
    
        
   
            <div class="row-fluid">
                
                <div class="span3 bs-docs-sidebar" id="left">
                    <ul class="nav nav-tabs nav-stacked nav-pills bs-docs-sidenav">
                        <?php if ($_SESSION["usuario"]=="admin"): ?>
                        <li><a href="#dropdowns" onclick="registrarLaboratorio()"><i class="icon-chevron-right"></i>Registrar Laboratorio</a></li>
                        <li><a href="#buttonGroups" onclick="registrarProfesor()"><i class="icon-chevron-right"></i>Registrar Profesor</a></li>
                        <li><a href="#buttonDropdowns" onclick="registrarCurso()"><i class="icon-chevron-right"></i>Registrar Curso</a></li>
                        <li><a href="#buttonDropdowns" onclick="registrarGrupo()"><i class="icon-chevron-right"></i>Registrar Grupo</a></li>
                        <?php endif ?>
                    </ul>
                </div>
                
                <div class="span9" id="right" >

                    <div id="contenedor_principal">


                    </div>


                </div>
            </div>

         
            
            <div class="navbar navbar-inverse"  style="margin: 0 0 0 0;" id="footer">
                <div class="navbar-inner" style="height: 100%; text-align: center;padding-top: 12px;">
                    <label style="text-decoration: none; color: #777; ">SISCONLAB V 1.2.5 - Copyright © Todos los Derechos Reservados</label>
                </div>

            </div>


        </body>



        <!-- modal -->
        <div class="modal hide fade" id="miAlert">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h5>Mensaje del Sistema</h5>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-success" data-dismiss="modal" >Aceptar</a>
            </div>
        </div>



        <!--<div class="row">
            <div>SISCONLAB v1.0 Copyright Todos los Derechos Reservados</div>
            <div>2013</div>
        </div>-->



        <!-- Scripts -->

        <script src="js/bootstrap.min.js"></script> 
        <!-- Calendario -->
        <link href='js/fullcalendar-1.6.1/fullcalendar/fullcalendar.css' rel='stylesheet' />
        <link href='js/fullcalendar-1.6.1/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='js/fullcalendar-1.6.1/fullcalendar/fullcalendar.min.js'></script>


    </html>
<?php } ?>
