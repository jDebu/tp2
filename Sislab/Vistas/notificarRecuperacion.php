<?php
include '../Conexion/cn.php';
include '../Modelos/grupoCurso.class.php';
include '../Modelos/curso.class.php';
include '../Modelos/administrador.class.php';
session_start();

$cur = new curso();
$rscur = $cur->obtener();

$admi= new administrador();
//$rsadmi= $admi->obtener($_SESSION["usuario"]); para varios admin y que pueda responder los msj-recuperacion 
$rsadmi= $admi->obtener();
# code...

 
?>


<form method='post'>
<fieldset>
    <legend>Notificacion de clases de Laboratorio</legend>
 
<!--  
 <?php //if ($_SESSION["usuario"]=="administrador"): ?>   
    <label>Destino</label>
    <input type="text" id="resp_admin" />
 <?php //else: ?>
 <input type="hidden" id="resp_admin" value=""/> 
 <?php //endif ?>
 --> 
    <label>Curso: </label>
    <select id="select_curso" value="0">
        <option val="0">- Seleccione Curso -</option>
        <?php

        while ($row = $rscur->getRow()) {
          
            ?>
            <option value="<?php echo $row["curso_nombre"]; ?>"><?php echo $row["curso_nombre"]; ?></option>
            
            <?php
        }
        ?>
    </select><br>
    <label>Grupo: </label>
    <select id="select_grupo" value="0">
        <option val="No regisrado">- Seleccione Grupo -</option>
        <option val="Grupo 1">Grupo 1  </option>
        <option val="Grupo 2">Grupo 2  </option>
        <option val="Grupo 3">Grupo 3 </option>
         <option val="Grupo 4">Grupo 4  </option>
    </select><br>
    <label>Mensaje:</label>
    <textarea id="contenido" style="width: 500px; height: 200px;">

    </textarea>
    <br>
 <!-- como solo pueded enviar notificaciones el profesor      
    <?php //if ($_SESSION["usuario"]=="administrador"): ?>
     <?php
        //while ($rowadmi = $rsadmi->getRow()) {
            ?>
        <input type="hidden" id="origen_hidden" value="<?php //echo $rowadmi["id_admin"]; ?>"> 
        <?php
        //}
        ?>
    <?php
        // while ($rowprof = $rspro->getRow()) {
            ?>
        <input type="hidden" id="destino_hidden" value="<?php // echo $rowprof["id_profesor"]; ?>"> 
        <?php
        //}
        ?>
    <?php // else: ?>    -->
    <?php
        $rowadmi = $rsadmi->getRow(); ?>
          
        <input type="hidden" id="destino_id_hidden" value="<?php echo $rowadmi["id_admin"]; ?>">
        <input type="hidden" id="destino_hidden" value="<?php echo $rowadmi["admi_usuario"]; ?>"> 
        
    <input type="hidden" id="origen_id_hidden" value="<?php echo $_SESSION["user_id"]; ?>">
    <input type="hidden" id="origen_hidden" value="<?php echo $_SESSION["nombre_usuario"]; ?>"> 
   <!-- <?php
       // while ($rowprof = $rspro->getRow2()) {
            ?>   -->
        
      <!--  <?php 
       // }
        ?>

  -->
  <!--  <?php //endif ?>   --> 
     


    <button type="submit" class="btn btn-success" onclick="notificar()" >Enviar</button>
       
</fieldset>
</form>