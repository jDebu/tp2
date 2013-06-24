<?php

class curso {
    //put your code here
    private $curso_nombre;
    private $escuela;
    private $plan;
    private $nivel;
    
    private $rs;

    public function curso($nombre= null, $escuela= null, $plan= null, $nivel= null){
        $this->curso_nombre = $nombre;
        $this->escuela = $escuela;
        $this->plan = $plan;
        $this->nivel = $nivel;
    }
    
    
    public function getNombre(){
        return $this->curso_nombre;
    }
    public function setNombre($nombre){
        $this->curso_nombre = $nombre;
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
        $sql = sprintf("INSERT INTO curso (curso_nombre, escuela, 
            plan, nivel) 
            values ('%s', '%s', '%s', '%s')", 
                $this->curso_nombre, 
                $this->escuela,
                $this->plan, 
                $this->nivel);
        
        $this->rs->query($sql);
        
        $this->rs->close();
        
        return 1;
    }
  
    public function obtener(){
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM curso");
        mysql_query("SET NAMES 'utf8'");
        $this->rs->query($sql);
        
        $rsaux = $this->rs;
        
        $this->rs->close();
        
        return $rsaux;
    }
    
    
}


?>
