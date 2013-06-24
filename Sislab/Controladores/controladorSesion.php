<?php
    include '../Conexion/cn.php';
    /*conectar a la base de datos*/
    $type=  $_POST["tipo"];
    $user = $_POST["usuario"]; 
    $pass = $_POST["password"];
    
      $rs = new DB();
    if ($type=="admin") {
        $sql = sprintf("select * from administrador where admi_nombre = '%s' and admi_password = '%s'",$user, $pass);
        
       # code...
    }else{
        $sql = sprintf("select * from profesor where prof_usuario = '%s' and prof_password = '%s'",$user, $pass);       
    }
    $rs->query($sql); 
     
    $resultado=$rs->getRow();
     
    if($rs->numRows()!=0){
        session_start();
        if ($type=="admin") {
            # code...
             $_SESSION["user_id"]=$resultado["id_admin"];
        } else {
            # code...
             $_SESSION["user_id"]=$resultado["id_profesor"];
             $_SESSION["nombre_usuario"]=$resultado["prof_nombres"]." ".$resultado["prof_apellidoP"]." ".$resultado["prof_apellidoM"];
        }
        
       
        $_SESSION["usuario"]=$user;# code...        
        echo 1;
    }else{

           //$_SESSION["usuario"]=$sql;
            echo 2;
      
    }
    $rs->close();

?>
