<?php

class grupoCurso {

    private $id_curso;
    private $id_profesor;
    private $grupo_nombre;

    public function grupoCurso($curso = null, $profesor = null, $nombre = null) {
        $this->id_curso = $curso;
        $this->id_profesor = $profesor;
        $this->grupo_nombre = $nombre;
    }

    public function getCurso() {
        return $this->id_curso;
    }

    public function setCurso($curso) {
        $this->id_curso = $curso;
    }

    public function getProfesor() {
        return $this->id_profesor;
    }

    public function setProfesor($profesor) {
        $this->id_profesor = $profesor;
    }

    public function getNombre() {
        return $this->grupo_nombre;
    }

    public function setNombre($nombre) {
        $this->grupo_nombre = $nombre;
    }

    public function grabar() {
        $this->rs = new DB();
        $sql = sprintf("INSERT INTO grupo_curso (id_curso, id_profesor, grupo_nombre) 
            values (%s, %s, '%s')", 
                $this->id_curso, 
                $this->id_profesor, 
                $this->grupo_nombre);

        $this->rs->query($sql);

        $this->rs->close();

        return 1;
    }

    public function obtener() {
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM grupo_curso");

        $this->rs->query($sql);

        $rsaux = $this->rs;

        $this->rs->close();

        return $rsaux;
    }
    
    public function obtener_noAsignados() {
        $this->rs = new DB();
        $sql = sprintf("SELECT * FROM grupo_curso where estado = 0");
        mysql_query("SET NAMES 'utf8'");
        $this->rs->query($sql);

        $rsaux = $this->rs;

        $this->rs->close();

        return $rsaux;
    }

}

?>
