<?php

include '../Conexion/cn.php';

    $sql = sprintf("insert into horario ( nombre , inicio, fin, dia)
        values ('%s','%s','%s','%s')",
            $_POST["titulo"],
            $_POST["inicio"],
            $_POST["fin"],
            $_POST["dia"]);
    
    $rs = new DB();
    $rs->query($sql);
    
    $rs->close();

?>
