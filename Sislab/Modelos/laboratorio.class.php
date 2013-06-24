<?php



class laboratorio {
    
    private $laboratorio_nombre;
    private $estado;
    private $descripcion;
    
    private $rs;
    
   
    
    public function laboratorio($nombre = null, $descripcion = null){
        $this->laboratorio_nombre = $nombre;
        $this->descripcion = $descripcion;
    }
    
    public function getNombre(){
        return $this->laboratorio_nombre;
    }
    public function setNombre($nombre){
        $this->laboratorio_nombre = $nombre;
    }
    
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function grabar2(){ return "hola";}
    public function grabar(){
        $this->rs = new DB();
        $sql = sprintf("INSERT INTO laboratorio (laboratorio_nombre, descripcion, 
            estado) 
            values ('%s', '%s', 1)", 
                $this->laboratorio_nombre, 
                $this->descripcion);
        
        $this->rs->query($sql);
        
        $this->rs->close();
        
        return 1;
    }
    
    public function obtener(){
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM laboratorio");
        
        $this->rs->query($sql);
        
        $rsaux = $this->rs;
        
        $this->rs->close();
        
        return $rsaux;
    }
    
    
    
}

?>
