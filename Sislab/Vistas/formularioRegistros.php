<?php 


$pr = new profesor();
$rsp = $pr->obtener();

$cur = new curso();
$rscur = $cur->obtener();

?>

<div class="modal hide fade" id="modal_registroLaboratorio" style="width: 400px; margin-left: -200px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Nuevo Laboratorio</h3>
    </div>
    <div class="modal-body">
        <label># Laboratorio</label><input type="text" id="input_numLab"/>
        <label>Descripcion </label><input type="text" id="input_descripcionLab"/>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" onclick="registrar_labo()">Registrar</a>  
        <a href="#" class="btn" data-dismiss="modal" >Cancelar</a>
    </div>
</div>

<div class="modal hide fade" id="modal_registroProfesor" style="width: 400px; margin-left: -200px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Nuevo Profesor</h3>
    </div>
    <div class="modal-body" style="padding-left: 20px;">
        <label>Nombres</label><input type="text" id="input_nombresProf"/>
        <label>Apellido Paterno</label><input type="text" id="input_apeP_prof"/>
        <label>Apellido Materno</label><input type="text" id="input_apeM_prof"/>
        <label>Email</label><input type="text" id="input_email_prof"/>
        <label>Usuario</label><input type="text" id="input_usuario_prof"/>
        <label>Password</label><input type="password" id="input_password_prof"/>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" onclick="registrar_Profesor()">Registrar</a>  
        <a href="#" class="btn" data-dismiss="modal" >Cancelar</a>
    </div>
</div>

<div class="modal hide fade" id="modal_registroCurso" style="width: 400px; margin-left: -200px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Nuevo Curso</h3>
    </div>
    <div class="modal-body">
        <label>Nombre </label><input type="text" id="input_nombreCurso"/>
        <label>Escuela</label>
        <select id="select_escuelaCurso" value ="0">
            <option value="0">-Seleccione escuela-</option>
            <option value="1">Ing. Sistemas</option>
            <option value="2">Ing. Software</option>
        </select> 
        <label>Plan</label>
        <select id="select_planCurso" value ="0">
            <option value="0">-Seleccione plan-</option>
            <option value="1">2009</option>
            <option value="1">2012</option>
        </select> 
        <label>Ciclo </label>
        <select id="select_cicloCurso" value ="0">
            <option value="0">-Seleccione ciclo-</option>
            <option value="1">I ciclo</option>
            <option value="2">II ciclo</option>
            <option value="3">III ciclo</option>
            <option value="4">IV ciclo</option>
            <option value="5">V ciclo</option>
            <option value="6">VI ciclo</option>
            <option value="7">VII ciclo</option>
            <option value="8">VIII ciclo</option>
            <option value="9">IX ciclo</option>
            <option value="10">X ciclo</option>
        </select>

    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" onclick="registrar_Curso()">Registrar</a>  
        <a href="#" class="btn" data-dismiss="modal" >Cancelar</a>
    </div>
</div>

<div class="modal hide fade" id="modal_registroGrupo" style="width: 400px; margin-left: -200px">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>Nuevo Grupo</h3>
    </div>
    <div class="modal-body">
        <label>Curso</label>
        <select id="select_cursoGrupo" value="0">
            <option value="0">- Seleccione Curso -</option>
            <?php 
            while($row = $rscur->getRow()){
                ?>
                <option value="<?php echo $row["id_curso"];?>"><?php echo $row["curso_nombre"];?></option>
                
                <?php
            }
            ?>
            
            
            
        </select>
        <label># Grupo</label><input type="text" id="input_numeroGrupo"/>
        <label>Profesor</label>
        <select id="select_profesorGrupo" value="0">
            <option value="0">-Seleccione Profesor-</option>
            <?php 
            while($row = $rsp->getRow()){
                ?>
                <option value="<?php echo $row["id_profesor"];?>">
                    <?php echo $row["prof_apellidoP"]." ".$row["prof_apellidoM"].", ".$row["prof_nombres"];?></option>
                
                <?php
            }
            ?>
        </select>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" onclick="registrar_Grupo()">Registrar</a>  
        <a href="#" class="btn" data-dismiss="modal" >Cancelar</a>
    </div>
</div>

