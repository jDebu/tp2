<?php

include '../Conexion/cn.php';
include '../Modelos/profesor.class.php';
include '../Modelos/mensaje.class.php';
include '../Modelos/laboratorio.class.php';
include '../Modelos/curso.class.php';
include '../Modelos/grupoCurso.class.php';
include '../Modelos/grupoCursoLaboratorio.class.php';
date_default_timezone_set('America/Lima');

if (isset($_POST["registro"])) {

    if ($_POST["registro"] == "profesor") {

        $profesor = new profesor($_POST["nombres"], $_POST["apellidoP"],
                        $_POST["apellidoM"], $_POST["email"],
                        $_POST["usuario"], $_POST["password"]);

        echo $profesor->grabar();
    }

    if ($_POST["registro"] == "laboratorio") {

        $laboratorio = new laboratorio($_POST["nombre"], $_POST["descripcion"]);
         
        echo $_POST["nombre"];
    }

    if ($_POST["registro"] == "curso") {

        $curso = new curso($_POST["nombre"],
                        $_POST["escuela"], $_POST["plan"], $_POST["nivel"]);

        echo $curso->grabar();
    }
    
    if ($_POST["registro"] == "grupo") {

        $grupo = new grupoCurso($_POST["curso"],$_POST["profesor"], $_POST["nombre"]);

        echo $grupo->grabar();
    }
    
    if ($_POST["registro"] == "horario") {

        $horario = new grupoCursoLaboratorio($_POST["grupo"],$_POST["id_labo"],
                $_POST["start"],$_POST["end"], $_POST["dia"]);

        echo $horario->grabar();
    }
//($destino= null, $contenido=null, $destino_id= null, $origen_id= null, $origen= null,$curso=null, $grupo=null){
   
    if ($_POST["registro"] == "mensaje") {
       $mensaje = new mensaje($_POST["destino"],$_POST["contenido"],$_POST["destino_id"],$_POST["origen_id"],$_POST["origen"],
      $_POST["curso"],$_POST["grupo"]);
       
        //$laboratorio = new laboratorio($_POST["nombre"], $_POST["descripcion"]);
         
       echo $mensaje->grabar2();
     
       //echo $_POST["origen_id"];
    }



}
?>
