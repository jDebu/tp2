<?php
include '../Conexion/cn.php';
include '../Modelos/grupoCurso.class.php';
include '../Modelos/curso.class.php';
include '../Modelos/profesor.class.php';
include '../Modelos/grupoCursoLaboratorio.class.php';

header('Content-Type: text/html;charset=utf-8');
session_start();


$horario = new grupoCursoLaboratorio();
$rshorario = $horario->obtener($_POST["id_labo"]);
?>
<script>
    
if ($("#type_user").val()=="admin") {

    $("#eliminar_evento").click(function(){
        var r = confirm("Borrar horario?");
        if(r){
            
            $.ajax({
                url:'Controladores/controladorEliminar.php',
                type:'post',
                data:{
                    eliminar:"horario",
                    id_labo:$("#id_laboratorio").val(),
                    grupo: $(this).attr("xid")
                }
            }).done(function(msg){
                
            });
            var opciones = $("#input_nuevoHorario").html();
            opciones = opciones + "<option value="+$(this).attr("xid")+">"+$("#dialog_detallesHorarioCurso").text()+"</option>";
            $("#input_nuevoHorario").html(opciones);
            $('#calendario').fullCalendar( 'removeEvents' , $(this).attr("xid"));
            $("#dialog_detallesHorario").modal("hide"); 
        }
    });
    $("#btn_grabarHorario").click(function(){
        
        if($("#input_nuevoHorario").val() == 0){
            
        }else{
            
            var title = $("#input_nuevoHorario option:selected").text();            
            var start = $("#start").val();
            var end = $("#end").val();
            var allDay = $("#allDay").val();
            agregarEvento(start, end, allDay, title);
            $("#dialog_nuevoHorario").modal("hide"); 
        }
    });
    
}
    
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
	
    var calendar = $('#calendario').fullCalendar({
        header: {
            left: '',
            center: '',
            right: ''
        },defaultView:'agendaWeek',
        
        firstDay :1,height:450,
        allDayText:'Dia Completo',
        columnFormat:{
            month: 'ddd',    // Mon
            week: 'dddd', // Mon 9/7
            day: 'dddd M/d'  // Monday 9/7
        },
        allDaySlot:false,
        minTime: 6,
        maxTime: 24,
        buttonText:{
            prev:     '&lsaquo;', // <
            next:     '&rsaquo;', // >
            prevYear: '&laquo;',  // <<
            nextYear: '&raquo;',  // >>
            today:    'today',
            month:    'month',
            week:     'Ver Programacion',
            day:      'day'
        },
        dayNamesShort:['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        dayNames:['Domingo', 'Lunes', 'Martes', 'Miercoles',
            'Jueves', 'Viernes', 'sabado'],
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            
            //htm = $("#midialog").html();
            
            var start = start;
            var end = end;
            var allday = allDay;
            $("#start").val(start);
            $("#end").val(end);
            $("#allDay").val(allday);
            //
            //nombre_cursos input_nuevoHorario
           if ($("#type_user").val()=="admin") { 
            $.ajax({
                url:'Controladores/controladorLectura.php',
                type:'post',
                data:{
                    obtener:"nombre_cursos"
                }
            }).done(function(msg){
                $("#input_nuevoHorario").html(msg);
            });
            
            $("#dialog_nuevoHorario").modal("show");
           } 
        },
        eventMouseover:function(event, jsEvent){
            //alert(event.id)
        },eventResize:function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view){
            if ($("#type_user").val()=="admin") {
            actualizarHorario(event); }
            /*LLAMADA AJAX PARA ACTUALIZAR EL ELEMENTO SELECCIONADO*/
        },eventDrop:function( event, jsEvent, ui, view ) { 
            //alert(event.id);
            if ($("#type_user").val()=="admin") {
            actualizarHorario(event); }
            /*LLAMADA AJAX PARA ACTUALIZAR EL ELEMENTO SELECCIONADO*/
        },eventAfterRender:function(event, element, view){
            //alert(event.start);
        },
        editable: true,
        eventClick:function( event, jsEvent, view ) { 
           if ($("#type_user").val()=="admin") { 
            /*CARGAMOS TODA LA INFO EN EL DIALOGO*/
            $.ajax({
                url:'Controladores/controladorLectura.php',
                type:'post',
                data:{
                    obtener:"horario",
                    id_labo:$("#id_laboratorio").val(),
                    grupo:event.id
                }
            }).done(function(msg){
                var horario = JSON.parse(msg);
                /*falta traer nombre de profesor , juntar el horario todo por consulta, nombre de curso y grupo*/
                var date_inicio = new Date(horario.hora_inicio);
                var date_fin = new Date(horario.hora_fin);
                event.id
                var minuto1 = date_inicio.getMinutes();
                if(minuto1<10){minuto1 = "0"+minuto1;}
                var minuto2 = date_fin.getMinutes();
                if(minuto2<10){minuto2 = "0"+minuto2;}
                var duracion = date_inicio.getHours() +":"+minuto1+" - "+date_fin.getHours() +":"+minuto2;
                
                $("#eliminar_evento").attr("xid",event.id);
                $("#dialog_detallesHorarioCurso").html(horario.curso);
                $("#dialog_detallesHorarioDocente").val(horario.profesor);
                $("#dialog_detallesHorarioHorario").val(duracion);
                $("#dialog_detallesHorarioDia").val(horario.dia);
                $("#dialog_detallesHorarioLaboratorio").val(horario.laboratorio_nombre);
                
                $("#dialog_detallesHorario").modal("show");
            });
            }
            
        },
        events: [
<?php
while ($row = $rshorario->getRow()) {
    echo "{
                            id:" . $row["id_grupo_curso"] . ",
                            title:'" . $row["curso_nombre"] . " " . $row["grupo_nombre"] . "',
                            start:new Date('" . $row["hora_inicio"] . "'),
                            end:new Date('" . $row["hora_fin"] . "'),
                            allDay:false,
                            backgroundColor:'#53B244'
                            },";
}
?>
            {}            
            /*{
                id: 1,
                title: 'Repeating Event',
                start: new Date(y, m, d-3, 16, 0),
                allDay: false
            },
            {
                id: 2,
                title: 'Repeating Event',
                start: new Date(y, m, d+4, 16, 0),
                allDay: false
            },
            {id: 5,
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false
            },
            {id: 3,
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false
            },
            {id: 4,
                title: 'Birthday Party',
                start: new Date(y, m, d+1, 19, 0),
                end: new Date(y, m, d+1, 22, 30),
                allDay: false
            }*/
        ]     
    }); $("#calendario").fullCalendar( 'gotoDate', 2020,0,14 );//necesario para k funcione correctamente setea en una semmana especifica y no se movera
</script>

<fieldset>
    <?php if ($_SESSION["usuario"]=="admin"): ?>
        <legend>Gesti&oacute;n de <?php echo $_POST["laboratorio_nombre"]; ?></legend>
    <?php else: ?>
        <legend>Ver <?php echo $_POST["laboratorio_nombre"]; ?></legend>
    <?php endif ?>
    
    <br><br>
    <div id="calendario">

    </div>
</fieldset>

<!-- Modal -->

<div id="dialog_nuevoHorario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 id="myModalLabel">Nuevo Horario</h4>
    </div>
    <div class="modal-body">
        <label>Ingrese Nombre del curso</label>
        <select id="input_nuevoHorario" value="0">

        </select>

        <input id="start" style="display: none"/>
        <input id="end" style="display: none"/>
    </div>
    <div class="modal-footer">
        <button id="btn_grabarHorario" class="btn btn-primary">Grabar</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>
</div>



<div id="dialog_detallesHorario" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 id="dialog_detallesHorarioCurso"></h4>
    </div>
    <div class="modal-body">

        <table>
            <tr><td width="150">Docente: </td>
                <td><input id="dialog_detallesHorarioDocente" type="text" readonly=""class="help-block" value="Zoraida" />

                </td></tr>
            <tr><td>Dia: </td>
                <td><input id="dialog_detallesHorarioDia" type="text" readonly=""class="help-block" value="miercoles" />

                </td></tr>
            <tr><td>Horario: </td>
                <td><input id="dialog_detallesHorarioHorario" type="text" readonly=""class="help-block" value="10:00am - 12:00pm" />

                </td></tr>
            <tr><td>Laboratorio: </td>
                <td><input id="dialog_detallesHorarioLaboratorio" type="text" readonly=""class="help-block" value="Lab 05" />

                </td></tr>

        </table>


    </div>
    <div class="modal-footer">
        <button id="eliminar_evento" xid="" class="btn btn-danger" aria-hidden="true">Eliminar</button>
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Aceptar</button>
    </div>
</div>

<input type="hidden" id="id_laboratorio" value="<?php echo $_POST["id_labo"]; ?>"/>
<input id="type_user" type="hidden" value="<?php echo $_SESSION["usuario"]; ?>" />



