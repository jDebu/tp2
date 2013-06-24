<?php



class profesor {

    private $prof_nombres;
    private $prof_apellidoP;
    private $prof_apellidoM;
    private $prof_email;
    private $prof_usuario;
    private $prof_password;
    private $rs;

    public function profesor($nombres= null, $apellidoP= null, $apellidoM= null, $email= null, $usuario= null, $password= null) {
        $this->prof_nombres = $nombres;
        $this->prof_apellidoP = $apellidoP;
        $this->prof_apellidoM = $apellidoM;
        $this->prof_email = $email;
        $this->prof_usuario = $usuario;
        $this->prof_password = $password;
    }

    public function getNombres() {
        return $this->prof_nombres;
    }

    public function setNombres($nombres) {
        $this->prof_nombres = $nombres;
    }

    public function getApellidoP() {
        return $this->prof_apellidoP;
    }

    public function setApellidoP($apellidoP) {
        $this->prof_apellidoP = $apellidoP;
    }

    public function getApellidoM() {
        return $this->prof_apellidom;
    }

    public function setApellidom($apellidoM) {
        $this->prof_apellidom = $apellidoM;
    }

    public function getEmail() {
        return $this->prof_email;
    }

    public function setEmail($email) {
        $this->prof_email = $email;
    }

    public function getUsuario() {
        return $this->prof_usuario;
    }

    public function setUsuario($usuario) {
        $this->prof_usuario = $usuario;
    }

    public function getPassword() {
        return $this->prof_password;
    }

    public function setPasswrod($password) {
        $this->prof_password = $password;
    }

    public function grabar() {
        $this->rs = new DB();
        $sql = sprintf("INSERT INTO profesor (prof_nombres, prof_apellidoP, 
            prof_apellidoM, prof_e_mail, prof_usuario, prof_password) 
            values ('%s', '%s', '%s', '%s', '%s', '%s')", 
                $this->prof_nombres, 
                $this->prof_apellidoP, 
                $this->prof_apellidoM, 
                $this->prof_email, 
                $this->prof_usuario, 
                $this->prof_password);
        
        $this->rs->query($sql);
        
        $this->rs->close();
        
        return 1;
    }
    
    public function obtener(){
        $this->rs = new DB();
        mysql_query("SET NAMES 'utf8'"); /* SIRVE PARA MOSTRAR LA Ñ Y LAS TILDES */
        $sql = sprintf("SELECT * FROM profesor");
        
        $this->rs->query($sql);
        
        $rsaux = $this->rs;
        
        $this->rs->close();
        
        return $rsaux;
    }

    public function obtener_($user){
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM profesor p where p.prof_usuario=%s",$user);
        mysql_query("SET NAMES 'utf8'");
        $this->rs->query($sql);
        
        $rsaux = $this->rs;
        
        $this->rs->close();
        
        return $rsaux;
    }
  
}

?>
