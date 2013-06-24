<?php
include '../Conexion/cn.php';
include '../Modelos/profesor.class.php';
include '../Modelos/laboratorio.class.php';
include '../Modelos/curso.class.php';
include '../Modelos/grupoCurso.class.php';
include '../Modelos/grupoCursoLaboratorio.class.php';

if (isset($_POST["eliminar"])) {
    
    if ($_POST["eliminar"] == "horario") {

            $horario = new grupoCursoLaboratorio();
            
            echo $horario->eliminar($_POST["grupo"],$_POST["id_labo"]);

    }
}
?>