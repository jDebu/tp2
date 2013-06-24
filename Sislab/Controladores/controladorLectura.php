<?php

include '../Conexion/cn.php';
include '../Modelos/profesor.class.php';
include '../Modelos/laboratorio.class.php';
include '../Modelos/curso.class.php';
include '../Modelos/grupoCurso.class.php';
include '../Modelos/grupoCursoLaboratorio.class.php';

if (isset($_POST["obtener"])) {

    if ($_POST["obtener"] == "horario") {

        $horario = new grupoCursoLaboratorio();

        echo $horario->obtener_horario($_POST["id_labo"], $_POST["grupo"]);
    }

    if ($_POST["obtener"] == "nombre_cursos") {


        $grucur = new grupoCurso();
        $rsgrucur = $grucur->obtener_noAsignados();
        $rsaux = new DB();

        $option = '<option value=0>- Seleccione Curso -</option>';

        while ($row = $rsgrucur->getRow()) {


            $sql1 = sprintf("Select curso_nombre 
                                from curso where id_curso = %s", $row["id_curso"]);
            mysql_query("SET NAMES 'utf8'"); /* SIRVE PARA MOSTRAR LA Ñ Y LAS TILDES */
            $rsaux->query($sql1);
            $row1 = $rsaux->getRow();



            $option.="<option value=" . $row["id_grupo_curso"] . ">" . $row1["curso_nombre"] . " " . $row["grupo_nombre"] . "</option>";
        }
        
        echo $option;
    }
}
?>
