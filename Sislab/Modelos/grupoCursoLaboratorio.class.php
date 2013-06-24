<?php

class grupoCursoLaboratorio {

    private $id_grupo_curso;
    private $id_labo;
    private $hora_inicio;
    private $hora_fin;
    private $dia;

    public function grupoCursoLaboratorio($grupo = null, $labo = null, $inicio = null, $fin = null, $dia = null) {
        $this->id_grupo_curso = $grupo;
        $this->id_labo = $labo;
        $this->hora_inicio = $inicio;
        $this->hora_fin = $fin;
        $this->dia = $dia;
    }

    public function getidGrupoCurso() {
        return $this->id_grupo_curso;
    }

    public function setidGrupoCurso($curso) {
        $this->id_grupo_curso = $curso;
    }

    public function getLabo() {
        return $this->id_labo;
    }

    public function setLabo($labo) {
        $this->id_labo = $labo;
    }

    public function getInicio() {
        return $this->hora_inicio;
    }

    public function setInicio($inicio) {
        $this->hora_inicio = $inicio;
    }

    public function getFin() {
        return $this->hora_fin;
    }

    public function setFin($fin) {
        $this->hora_fin = $fin;
    }

    public function getDia() {
        return $this->dia;
    }

    public function setDia($dia) {
        $this->dia = $dia;
    }

    public function grabar() {
        $this->rs = new DB();
        $sql = sprintf("INSERT INTO grupo_curso_laboratorio 
            (id_grupo_curso, id_labo, hora_inicio, hora_fin, dia) 
            values (%s, %s, '%s', '%s', '%s')", $this->id_grupo_curso, $this->id_labo, $this->hora_inicio, $this->hora_fin, $this->dia);

        $this->rs->query($sql);

        /////////////////Actualizamos el atributo estado=1 del curso en la BD
        $sql = sprintf("update grupo_curso set estado = 1 where id_grupo_curso = %s", $this->id_grupo_curso);
        $this->rs->query($sql);

        $this->rs->close();

        return 1;
    }

    public function obtener($id) {/* obtiene todos los cursos por laboratorio */
        $this->rs = new DB();
        $sql = sprintf("SELECT a.id_grupo_curso, a.hora_inicio, a.hora_fin , 
                        c.curso_nombre, b.grupo_nombre
                        FROM grupo_curso_laboratorio a
                        LEFT JOIN grupo_curso b on a.id_grupo_curso = b.id_grupo_curso
                        LEFT JOIN curso c on b.id_curso = c.id_curso
                        where id_labo = %s", $id);
        
        mysql_query("SET NAMES 'utf8'"); /* SIRVE PARA MOSTRAR LA Ñ Y LAS TILDES */
        $this->rs->query($sql);

        $rsaux = $this->rs;

        $this->rs->close();

        return $rsaux;
    }

    public function actualizar($grupo, $labo, $inicio, $fin, $dia) {

        $this->rs = new DB();

        $sql = sprintf("UPDATE grupo_curso_laboratorio 
            set hora_inicio = '%s' , hora_fin = '%s', dia = '%s'
            where id_grupo_curso = %s and id_labo =%s", $inicio, $fin, $dia, $grupo, $labo);

        $this->rs->query($sql);

        $this->rs->close();

        return 1;
    }

    public function obtener_horario($id_labo, $id_grupo_curso) {/* obtiene todos los cursos por laboratorio */
        $this->rs = new DB();
        $sql = sprintf("SELECT a.id_grupo_curso, a.hora_inicio, a.hora_fin , a.dia,
                        c.curso_nombre, b.grupo_nombre, d.laboratorio_nombre, 
                        e.prof_nombres, e.prof_apellidoP, e.prof_apellidoM
                        FROM grupo_curso_laboratorio a
                        LEFT JOIN grupo_curso b on a.id_grupo_curso = b.id_grupo_curso
                        LEFT JOIN curso c on b.id_curso = c.id_curso
                        LEFT JOIN laboratorio d on a.id_labo = d.id_labo
                        LEFT JOIN profesor e on b.id_profesor = e.id_profesor
                        where a.id_labo = %s and a.id_grupo_curso = %s", $id_labo, $id_grupo_curso);
        mysql_query("SET NAMES 'utf8'"); /* SIRVE PARA MOSTRAR LA Ñ Y LAS TILDES */
        $this->rs->query($sql);

        $row = $this->rs->getRow();

        $this->rs->close();

        $hor = array('id_grupo_curso' => $row["id_grupo_curso"],
            'curso' => $row["curso_nombre"] . " " . $row["grupo_nombre"],
            'profesor' => $row["prof_apellidoP"] . " " . $row["prof_apellidoM"] . ", " . $row["prof_nombres"],
            'laboratorio_nombre' => $row["laboratorio_nombre"],
            'hora_inicio' => $row["hora_inicio"],
            'hora_fin' => $row["hora_fin"],
            'dia' => $row["dia"]);

        echo json_encode($hor);
    }

    public function eliminar($id_grupo_curso, $id_labo) {
        $this->rs = new DB();
        $sql = sprintf("delete from grupo_curso_laboratorio 
                        where id_grupo_curso = %s and id_labo = %s", $id_grupo_curso, $id_labo);
        $this->rs->query($sql);

        /////////////////Actualizamos el atributo estado=1 del curso en la BD
        $sql = sprintf("update grupo_curso set estado = 0 where id_grupo_curso = %s", $id_grupo_curso);
        $this->rs->query($sql);

        $this->rs->close();

        return 1;
    }

}

?>
