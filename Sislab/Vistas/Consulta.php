<?php
include '../Conexion/cn.php';
include '../Modelos/profesor.class.php';
include '../Modelos/curso.class.php';
$pr = new profesor();
$rsp = $pr->obtener();

$cur = new curso();
$rscur = $cur->obtener();
?>

<fieldset>

    <?php
    if (isset($_POST["tipo"])) {


        if ($_POST["tipo"] == 1) {
            ?>

            <legend>Consulta por profesor</legend>
            <span class="help-block">Seleccione Profesor</span>
            <select id="select_profesor" value="0">
                <option value="0">-Seleccione Profesor-</option>
                <?php
                while ($row = $rsp->getRow()) {
                    ?>
                    <option value="<?php echo $row["id_profesor"]; ?>">
                        <?php echo $row["prof_apellidoP"] . " " . $row["prof_apellidoM"] . ", " . $row["prof_nombres"]; ?></option>

                    <?php
                }
                ?>
            </select>
            </br>

            <button type="submit" class="btn btn-success" onclick="buscarProfesor($('#select_profesor').val())">Consultar</button>
            <br><br>
            <table class="table table-hover table-bordered" id="tablaConsultaProfesor">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Curso</th>
                        <th>Grupo</th>
                        <th>Laboratorio</th>
                        <th>Horario</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


            <?php
        }
        if ($_POST["tipo"] == 2) {
            ?>
            <legend>Consulta por curso</legend>
            <span class="help-block">Seleccione Curso</span>
            <select id="select_curso" value="0">
                <option val="0">- Seleccione Curso -</option>
                <?php
                while ($row = $rscur->getRow()) {
                    ?>
                    <option value="<?php echo $row["id_curso"]; ?>"><?php echo $row["curso_nombre"]; ?></option>

                    <?php
                }
                ?>
            </select>
            </br>
             <button type="submit" class="btn btn-success" onclick="buscarCurso($('#select_curso').val())">Consultar</button>

          
            <br><br>
            <table class="table table-hover table-bordered" id="tablaConsultaCurso">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Grupo</th>
                        <th>Dia</th>
                        <th>Horario</th>
                        <th># Laboratorio</th>
                    </tr>
                </thead>
                <tbody>

                   
                </tbody>
            </table>

            <?php
        }
    }
    ?>
</fieldset>