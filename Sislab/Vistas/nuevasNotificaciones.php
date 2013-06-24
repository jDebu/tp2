<?php

include '../Conexion/cn.php';
include '../Modelos/mensaje.class.php';

$ms = new mensaje();
$msj = $ms->obtener();

 ?>
<fieldset>
    <legend>Bandeja de Mensajes</legend>
<div>


    <div style="text-align: right; width: 95%;">
        <button class="btn btn-success">Ver Mensaje</button>
        <button class="btn btn-danger">Eliminar</button>
    </div>
    <br>
    <table class="table table-hover table-bordered" width="95%">
        <thead>
            <tr>


                <th>Nombre</th>
                
                <th>Asunto</th>

                <th>Curso</th>

                <th>Fecha</th>

            </tr>

          
        </thead>
        <tbody>
              
            
           <?php if (($num=$msj->numRows())!=0): 
                    while ($row = $msj->getRow()) {?>
                    <tr>
                        <td>   <?php echo $row["origen"]; ?></td>
                        <td>   <?php echo $row["asunto"]; ?> </td>
                        <td>   <?php echo $row["curso"]; ?></td>
                        <td>   <?php echo $row["fecha"]." ".$row["hora"]?>;</td>
                    </tr>
                  
                    <?php } ?>  

              
          <?php else: ?>
               <tr>
                <td colspan="5" style="text-align: center"> No hay notificaciones pendientes</td>
            </tr>
          <?php endif ?>
        </tbody>
    </table>
</div>
</fieldset>
