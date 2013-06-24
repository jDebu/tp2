<?php
include '../Conexion/cn.php';
include '../Modelos/profesor.class.php';
include '../Modelos/laboratorio.class.php';
include '../Modelos/curso.class.php';
include '../Modelos/grupoCurso.class.php';
include '../Modelos/grupoCursoLaboratorio.class.php';

if (isset($_POST["actualizar"])) {
    
    if ($_POST["actualizar"] == "horario") {

            $horario = new grupoCursoLaboratorio();
            
            echo $horario->actualizar($_POST["grupo"], $_POST["id_labo"], $_POST["start"], $_POST["end"], $_POST["dia"]);

    }
}
?>
