<?php

class administrador {
    //put your code here
    private $administrador_nombre;
    private $escuela;
    private $plan;
    private $nivel;
    
    private $rs;
/*
    public function administrador($nombre= null, $escuela= null, $plan= null, $nivel= null){
        $this->administrador_nombre = $nombre;
        $this->escuela = $escuela;
        $this->plan = $plan;
        $this->nivel = $nivel;
    }
    
    
    public function getNombre(){
        return $this->administrador_nombre;
    }
    public function setNombre($nombre){
        $this->administrador_nombre = $nombre;
    }
    
    public function getEscuela(){
        return $this->escuela;
    }
    public function setEscuela($escuela){
        $this->escuela = $escuela;
    }
    
    public function getPlan(){
        return $this->plan;
    }
    public function setPlan($plan){
        $this->plan = $plan;
    }
    
    public function grabar(){
        $this->rs = new DB();
        $sql = sprintf("INSERT INTO administrador (administrador_nombre, escuela, 
            plan, nivel) 
            values ('%s', '%s', '%s', '%s')", 
                $this->administrador_nombre, 
                $this->escuela,
                $this->plan, 
                $this->nivel);
        
        $this->rs->query($sql);
        
        $this->rs->close();
        
        return 1;
    }
  */
    public function obtener(){
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM administrador");
        mysql_query("SET NAMES 'utf8'");
        $this->rs->query($sql);
        
        $rsaux = $this->rs;
        
        $this->rs->close();
        
        return $rsaux;
    }
    //mas administradores
    public function obtener_($user){
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM administrador a where a.admi_usuario=%s",$user);
        mysql_query("SET NAMES 'utf8'");
        $this->rs->query($sql);
        
        $rsaux = $this->rs;
        
        $this->rs->close();
        
        return $rsaux;
    }
   
    
}


?>