<?php

class mensaje {
    //put your code here
    private $origen;
    private $destino;
    private $asunto;
    private $descripcion;
    private $fecha;
    private $hora;
    private $curso;
    private $grupo;
    private $id_profesor;
    private $id_admin;

    private $rs;
  
   

    public function mensaje($destino= null, $contenido=null, $destino_id= null, $origen_id= null, $origen= null,$curso=null, $grupo=null){
        $this->origen = $origen;
        $this->destino=$destino;
        $this->asunto="Recuperacion";
        $this->curso =$curso;
        $this->grupo =$grupo ;
        $this->descripcion =$contenido;
        $this->id_profesor=$origen_id;
        $this->id_admin=$destino_id;
        
    }
  /*  
    public function mensaje($id_admin= null, $id_profesor=null){
       $this->id_admin=$id_admin;
       $this->id_profesor=$id_profesor;
    }
   */ 
    public function getOrigen(){
        return $this->origen;
    }
    public function setOrigen($origen){
        $this->origen = $origen;
    }
    
    public function getDestino(){        
        return $this->destino;
    }
   
    public function getAsunto(){
        return $this->asunto;
    }
    public function setAsunto($asunto){
        $this->asunto = $asunto;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function pruebaFecha(){
        $fechaActual=new DateTime();
        $this->fecha=$fechaActual->format("H:i:s");
        return $this->fecha;
    }

    public function grabar2(){

        $this->rs = new DB();
         $fechaActual=new DateTime();
        $this->fecha=$fechaActual->format("d-m-Y");
        $this->hora=$fechaActual->format("H:i:s");
        //$this->hora=echo new DateTime(date("H:i:s"));
        $sql= sprintf("INSERT INTO mensaje (id_profesor, id_admin, origen, destino, asunto, descripcion,fecha,hora,curso,grupo) 
                       values ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
                       $this->id_profesor,
                       $this->id_admin,
                       $this->origen,
                       $this->destino,
                       $this->asunto,
                       $this->descripcion,
                       $this->fecha,
                       $this->hora,
                       $this->curso,
                       $this->grupo);
        $this->rs->query($sql); 
        $this->rs->close();
        return 1;
        //$ee= $this->id_admin." "."oa po";
        //return $ee;
    }
    
    public function grabar(){
   /*
        $this->rs = new DB();
        $sql = sprintf("SELECT p.prof_nombres, p.prof_apellidoP, p.prof_apellidoM 
                        FROM mensaje m 
                        LEFT JOIN profesor p on m.id_profesor = p.id_profesor
                        where p.prof_usuario= %s",$this->origen);
     
        mysql_query("SET NAMES 'utf8'");
        $this->rs->query($sql);
        $rsaux = $this->rs;
        while ($prof_nombre=mysql_fetch_array($rsaux)) {
           $prof_nombre[""];
        }

        $this->rs->close();
*/
        $this->rs = new DB();
       $this->fecha=new DateTime(date("d-m-Y"));
       $this->hora=new DateTime(date("H:i:s"));

        $sql = sprintf("INSERT INTO mensaje (destino, asunto, 
            descripcion, id_admin, id_profesor,origen,curso,grupo,fecha,hora) 
            values ('%s', '%s', '%s', '%s, '%s', '%s', '%s', '%s','%s','%s')", 
                $this->destino, 
                $this->asunto,
                $this->descripcion, 
                $this->id_admin,
                $this->id_profesor,
                $this->origen,
                $this->curso,
                $this->grupo,
                $this->fecha,
                $this->hora);


        $this->rs->query($sql);
         $this->rs->close();
        
        return 1;
    }
  
    public function obtener(){
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM mensaje");
        mysql_query("SET NAMES 'utf8'");
        $this->rs->query($sql);
        $rsaux = $this->rs;
        $this->rs->close();
        return $rsaux;
    }
    
    
}


?>