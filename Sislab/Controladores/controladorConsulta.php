<?php
include '../Conexion/cn.php';
include '../Modelos/profesor.class.php';
include '../Modelos/curso.class.php';
date_default_timezone_set('America/Lima');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controladorConsulta
 *
 * @author MARIO PC
 */
if (isset($_POST["consultar"])) {
    if ($_POST["consultar"] == "profesor") {

        $id_profesor = $_POST["id_profesor"];

        $rs = new DB();
        mysql_query("SET NAMES 'utf8'"); /* SIRVE PARA MOSTRAR LA Ñ Y LAS TILDES */
        $sql = sprintf("select *  from grupo_curso a 
            inner join profesor b on a.id_profesor = b.id_profesor
            inner join curso c on a.id_curso = c.id_curso
            left join grupo_curso_laboratorio d on a.id_grupo_curso = d.id_grupo_curso
            left join laboratorio e on d.id_labo = e.id_labo
            where a.id_profesor = %s", $id_profesor);

        $rs->query($sql);

        while ($row = $rs->getRow()) {
            ?>
            <tr>
                <td>
                    <?php echo $row["prof_apellidoP"] . " " . $row["prof_apellidoM"] . ", " . $row["prof_nombres"]; ?>
                </td>
                <td>
                    <?php echo $row["curso_nombre"]; ?>
                </td>
                <td>
                    <?php echo $row["grupo_nombre"]; ?>
                </td>
                <td>
                    
                    <?php 
                     if($row["hora_inicio"]!=NULL && $row["hora_fin"]!=NULL ){
                    echo $row["laboratorio_nombre"]; 
                     }else{
                         echo "No registrado";
                     }
                    ?>
                </td>
                <td>
                    <?php
                    if($row["hora_inicio"]!=NULL && $row["hora_fin"]!=NULL ){
                        
                    $objDateTime = date_create($row["hora_inicio"]);
                    $phpdatetime = $objDateTime->format('H:i'); // your datetime format
                    echo $phpdatetime;
                    ?> - <?php 
                    $objDateTime = date_create($row["hora_fin"]);
                    $phpdatetime = $objDateTime->format('H:i'); // your datetime format
                    echo $phpdatetime;
                        
                    }else{
                        echo "No registrado";
                    }
                    
                    
                    ?>
                </td>
            </tr>

            <?php
        }
    }
    if ($_POST["consultar"] == "curso") {

        $id_curso = $_POST["id_curso"];

        $rs = new DB();
        mysql_query("SET NAMES 'utf8'"); /* SIRVE PARA MOSTRAR LA Ñ Y LAS TILDES */
        $sql = sprintf("select *  from grupo_curso_laboratorio a 
            inner join grupo_curso b on a.id_grupo_curso = b.id_grupo_curso
            inner join laboratorio c on a.id_labo = c.id_labo
            left join profesor e on b.id_profesor = e.id_profesor
            left join curso d on b.id_curso = d.id_curso
            where b.id_curso = %s", $id_curso);

        $rs->query($sql);

        while ($row = $rs->getRow()) {
            ?>
            <tr>
                
                <td>
                    <?php echo $row["curso_nombre"]; ?>
                </td>
                <td>
                    <?php echo $row["grupo_nombre"]; ?>
                </td>
                <td>
                    <?php echo $row["dia"]; ?>
                </td>
                <td>
                    <?php
                    if($row["hora_inicio"]!=NULL && $row["hora_fin"]!=NULL ){
                        
                    $objDateTime = date_create($row["hora_inicio"]);
                    $phpdatetime = $objDateTime->format('H:i'); // your datetime format
                    echo $phpdatetime;
                    ?> - <?php 
                    $objDateTime = date_create($row["hora_fin"]);
                    $phpdatetime = $objDateTime->format('H:i'); // your datetime format
                    echo $phpdatetime;
                        
                    }else{
                        echo "No registrado";
                    }
                    
                    
                    ?>
                </td>
                <td>
                    
                    <?php 
                     if($row["hora_inicio"]!=NULL && $row["hora_fin"]!=NULL ){
                    echo $row["laboratorio_nombre"]; 
                     }else{
                         echo "No registrado";
                     }
                    ?>
                </td>                
            </tr>

            <?php
        }
    }

}


?>
