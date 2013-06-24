$(document).ready(function() {
    home();
    
    
    $('ul.nav > li').click(function (e) {
        e.preventDefault();
        $('ul.nav > li').removeClass('active');
        $(this).addClass('active');                
    }); 
    
    $('#modal_registroLaboratorio').on('hidden', function () {
        $('#modal_registroLaboratorio input').val("");
    })
    
    $('#modal_registroProfesor').on('hidden', function () {
        $('#modal_registroProfesor input').val("");
    })
    
    $('#modal_registroCurso').on('hidden', function () {
        $('#modal_registroCurso input').val("");
    })
    
    $('#modal_registroGrupo').on('hidden', function () {
        $('#modal_registroGrupo input').val("");
    })

});

function home(){
    // $("#li_AsignarHorario").removeAttr('class');
    $.ajax({
        url:'Vistas/Inicio.php',
        type:'post',
        data:{}
    }).done(function(msg){
        $("#contenedor_principal").html(msg);
    });
    
}

function asignarHorario(id_labo, laboratorio_nombre){
    // $("#li_AsignarHorario").removeAttr('class');
    $.ajax({
        url:'Vistas/AsignarHorario.php',
        type:'post',
        data:{
            id_labo:id_labo, 
            laboratorio_nombre:laboratorio_nombre
        }
    }).done(function(msg){
        $("#contenedor_principal").html(msg);
    });
    
}

function agregarEvento(start, end, allDay, title){

    
    var id = $("#input_nuevoHorario").val();
    var id_labo = $("#id_laboratorio").val();
    $("#input_nuevoHorario option[value="+$("#input_nuevoHorario").val()+"]").remove();
    
    var numdia = new Date(start).getDay();
    var dia;
    switch(numdia){
        case 0:
            dia = "domingo";
            break;
        case 1:
            dia = "lunes";
            break;
        case 2:
            dia = "Martes";
            break;
        case 3:
            dia = "Miercoles";
            break;
        case 4:
            dia = "Jueves";
            break;
        case 5:
            dia = "Viernes";
            break;
        case 6:
            dia = "Sabado";
            break;
        
                            
    }
    
    $.ajax({
        url:'Controladores/controladorRegistros.php',
        type:'post',
        data:{
            registro:"horario",
            id_labo:id_labo,
            grupo:id,
            start:start, 
            end:end,
            dia:dia
        }
    }).done(function(msg){
        $("#input_nuevoHorario").val(0);
        $("#dialog_nuevoHorario").modal("hide");
        $("#miAlert .modal-body").html("<h4 style=text-align:center>Se registro el horario</h4>");
        $("#miAlert").modal("show");
    });
    
    
    $('#calendario').fullCalendar('renderEvent',
    {
        id:id,
        title: title,
        start: start,
        end: end,
        allDay: false,
        backgroundColor:'#53B244'
    },
    true // make the event "stick"
    );
    $('#calendario').fullCalendar('unselect');
    $("#input_nuevoHorario").val("");
    
}

function consulta(tipo){
    /*tipo: 1 Por profesor*/
    /*tipo: 2 Por materia*/
   
    $.ajax({
        url:'Vistas/Consulta.php',
        type:'post',
        data:{
            tipo:tipo
        }
    }).done(function(msg){
        console.log(tipo);
        $("#contenedor_principal").html(msg);
    });
}

function ventanaNotificar(){
    $.ajax({
        url:'Vistas/notificarRecuperacion.php',
        type:'post',
        data:{}
    }).done(function(msg){
        $("#contenedor_principal").html(msg);
    });
}

function abrirNotificaciones(){
    $.ajax({
        url:'Vistas/nuevasNotificaciones.php',
        type:'post',
        data:{}
    }).done(function(msg){
        $("#contenedor_principal").html(msg);
    });
    
}
/*ESTAS FUNCIONES SOLO ABREN EL DIALOG*/
function registrarLaboratorio(){
    $("#modal_registroLaboratorio").modal("show");
}

function registrarProfesor(){
    $("#modal_registroProfesor").modal("show");
}

function registrarCurso(){
    $("#modal_registroCurso").modal("show");
}

function registrarGrupo(){
    $("#modal_registroGrupo").modal("show");
}
/*ESTAS FUNCIONES REGISTRAN LOS DATOS EN LA BASE DE DATOS*/
function registrar_labo(){
    $("#input_numLab");
    var nombre = "Laboratorio "+$("#input_numLab").val();
    var descripcion = $("#input_descripcionLab").val();
   
    $.ajax({
        url:'Controladores/controladorRegistros.php',
        type:'post',
        data:{
            registro:"laboratorio",
            nombre:nombre, 
            descripcion:descripcion
        }
    }).done(function(msg){
      //  alert(msg);
        if(msg == 1){
            $("#input_numLab").val("");
            $("#input_descripcionLab").val("");
            $("#modal_registroLaboratorio").modal("hide");
            $("#miAlert .modal-body").html("<h4 style=text-align:center>Se registro el laboratorio</h4>");
            $("#miAlert").modal("show");
        }
    });
   
}

function registrar_Profesor(){
     
    var nombres = $("#input_nombresProf").val();
    var apellidoP = $("#input_apeP_prof").val();
    var apellidoM = $("#input_apeM_prof").val();
    var email = $("#input_email_prof").val();
    var usuario = $("#input_usuario_prof").val();
    var password = $("#input_password_prof").val();
    $.ajax({
        url:'Controladores/controladorRegistros.php',
        type:'post',
        data:{
            registro:"profesor", 
            nombres:nombres, 
            apellidoP:apellidoP, 
            apellidoM:apellidoM,
            email:email,
            usuario:usuario, 
            password:password
        }
    }).done(function(msg){
        
        if(msg == 1){
            $("#input_nombresProf").val("");
            $("#input_apeP_prof").val("");
            $("#input_apeM_prof").val("");
            $("#input_email_prof").val("");
            $("#input_usuario_prof").val("");
            $("#input_password_prof").val("");
            $("#modal_registroProfesor").modal("hide");
            $("#miAlert .modal-body").html("<h4 style=text-align:center>Se registro el profesor</h4>");
            $("#miAlert").modal("show");
        }
    });
   
}

function registrar_Curso(){
   
    if($("#input_nombreCurso").val() == ""|| $("#select_escuelaCurso").val()==0||
        $("#select_planCurso").val()==0 || $("#select_cicloCurso").val()==0){
        alert("Llene todos los campos");
    }else{
        var nombre = $("#input_nombreCurso").val();
        var escuela;
        if($("#select_escuelaCurso").val()==1){
            escuela ="Ing. Sistemas";
        }
        if($("#select_escuelaCurso").val()==2){
            escuela ="Ing. Software";
        }
        var plan;
        if($("#select_planCurso").val()==1){
            plan ="2009";
        }
        if($("#select_planCurso").val()==2){
            plan ="2012";
        }
        var nivel = "Ciclo "+$("#select_cicloCurso").val();
   
        $.ajax({
            url:'Controladores/controladorRegistros.php',
            type:'post',
            data:{
                registro:"curso", 
                nombre:nombre, 
                escuela:escuela, 
                plan :plan, 
                nivel:nivel
            }
        }).done(function(msg){
        
            if(msg == 1){
                $("#input_nombreCurso").val("");
                $("#select_escuelaCurso").val(0);
                $("#select_planCurso").val(0);
                $("#select_cicloCurso").val(0);
                $("#modal_registroCurso").modal("hide");
                $("#miAlert .modal-body").html("<h4 style=text-align:center>Se registro el curso</h4>");
                $("#miAlert").modal("show");
            }
        });
    }
    
   
}

function registrar_Grupo(){
    
   
    var profesor = $("#select_profesorGrupo").val();
    var nombre = "G"+$("#input_numeroGrupo").val();
    var curso = $("#select_cursoGrupo").val();
    $.ajax({
        url:'Controladores/controladorRegistros.php',
        type:'post',
        data:{
            registro:"grupo", 
            profesor:profesor, 
            nombre:nombre, 
            curso:curso
        }
    }).done(function(msg){
        
        if(msg == 1){
            $("#select_profesorGrupo").val(0);
            $("#input_numeroGrupo").val("");
            $("#select_cursoGrupo").val(0);
            
            $("#modal_registroGrupo").modal("hide");
            $("#miAlert .modal-body").html("<h4 style=text-align:center>Se registro el grupo</h4>");
            $("#miAlert").modal("show");
        }
    });
   
}

function actualizarHorario(event){
    var id = event.id;
    var id_labo = $("#id_laboratorio").val();
    var start = event.start;
    var end = event.end;
    //$("#input_nuevoHorario option[value="+$("#input_nuevoHorario").val()+"]").remove();
    
    var numdia = new Date(event.start).getDay();
    var dia;
    switch(numdia){
        case 0:
            dia = "domingo";
            break;
        case 1:
            dia = "lunes";
            break;
        case 2:
            dia = "Martes";
            break;
        case 3:
            dia = "Miercoles";
            break;
        case 4:
            dia = "Jueves";
            break;
        case 5:
            dia = "Viernes";
            break;
        case 6:
            dia = "Sabado";
            break;
        
                            
    }
    
    $.ajax({
        url:'Controladores/controladorActualizar.php',
        type:'post',
        data:{
            actualizar:"horario",
            id_labo:id_labo,
            grupo:id,
            start:start, 
            end:end,
            dia:dia
        }
    }).done(function(msg){
        //alert(msg)
        });
        
        

}


function buscarProfesor( id_profesor){
    $.ajax({
        url:'Controladores/controladorConsulta.php',
        type:'post',
        data:{
            consultar:"profesor", 
            id_profesor:id_profesor
           
        }
    }).done(function(msg){
        $("#tablaConsultaProfesor tbody").html(msg);
    });
}

function buscarCurso(id_curso){
    $.ajax({
        url:'Controladores/controladorConsulta.php',
        type:'post',
        data:{
            consultar:"curso", 
            id_curso:id_curso
           
        }
    }).done(function(msg){
        $("#tablaConsultaCurso tbody").html(msg);
    });
}

function notificar(){
    var curso = $("#select_curso").val();
    var grupo= $("#select_grupo").val();
    var contenido= $("#contenido").val();
    var origen_id=$("#origen_id_hidden").val();
    var destino_id= $("#destino_id_hidden").val();
    var origen= $("#origen_hidden").val();
    var destino= $("#destino_hidden").val();
    console.log("dsdfdcgchgchchjchjvjbjb");
    console.log(origen);
    console.log(destino_id);
    $.ajax({
        url:'Controladores/controladorRegistros.php',
         type:'post',
        data:{
            registro:"mensaje",
            curso:curso,
            grupo:grupo, 
            contenido:contenido,
            origen_id:origen_id,
            destino_id:destino_id,
            origen:origen,
            destino:destino
        }
    }).done(function(msg){
        console.log("wdmierda");
        //alert(msg);
        if(msg == 1){
            $("#select_curso").val(0);
            $("#select_grupo").val(0);
            $("#contenido").val("");
            $("#miAlert .modal-body").html("<h4 style=text-align:center>Se envio el mensaje</h4>");
            $("#miAlert").modal("show");

        }else{
           
            $("#miAlert .modal-body").html("<h4 style=text-align:center>No Se envio el mensaje</h4>");
            $("#miAlert").modal("show");
        }
    });alert("");

}

