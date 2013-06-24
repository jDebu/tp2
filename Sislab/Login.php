
<?php
if (!isset($_SESSION["usuario"])) {
    ?>
 
    <html>
        <head>
            <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link href="css/estilo.css" rel="stylesheet" media="screen">

            <script src="js/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
            <script src="js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
            <script> 
                    
                $(document).ready(function(){ 
                    
                    $("#type_user").val("admin");
                    $("#header_admin").show();
                    $("#header_docente").hide();
                    $("#div_btn_admin").hide();
                    $("#div_btn_docente").show();

                    $("#btn_docente").click(function(){
                        $("#type_user").val("profesor");
                        $("#header_admin").hide();
                        $("#header_docente").show();
                        $("#div_btn_admin").show();
                        $("#div_btn_docente").hide();
                    });
                    $("#btn_admin").click(function(){
                        $("#type_user").val("admin");
                        $("#header_admin").show();
                        $("#header_docente").hide();
                        $("#div_btn_admin").hide();
                        $("#div_btn_docente").show();
                    });


                    $("#type_user").hide();
                    $("#label_error").hide();
                    $("#div_login").modal({keyboard:false, backdrop:false}); 
                    $("#div_login").modal("show");
                    $("#btn_login").click(function(){
                      
                        var usuario=$("#input_user").val();
                        var password=$("#input_pass").val();
                        var tipo=$("#type_user").val();
                        console.log(tipo);

                        $.ajax({
                            url:'Controladores/controladorSesion.php',
                            type:'post',
                            data:{usuario:usuario, password:password, tipo:tipo}
                        }).done(function(msg){
                            console.log(msg);
                           // console.log($_SESSION["usuario"]);
                            if(msg=="1"){
                                location.href="index.php";          
                            }else{                 
                                $("#label_error").show();
                                $("#div_login").effect("shake", { times:3 }, 500);
                            }  
                                            
                        });         
                              
                    });
                });
                                    
                                  
            </script>
            <style>
                body{
                    background: rgb(0, 0, 0) transparent;
                    /* RGBa with 0.6 opacity */
                    background: rgba(0, 0, 0, 0.6);
                    /* For IE 5.5 - 7*/
                    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
                    /* For IE 8*/
                    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
                }
                #div_login{

                }
            </style>
        </head>
        <body>

            <br><br>


            <div class="modal show fade" id="div_login">
                <div class="modal-header">
                    <h4 id="header_admin">Iniciar como Administrador</h4>
                    <h4 id="header_docente">Iniciar como Docente</h4>
                </div>
              
                <div class="modal-body">

                    <label>Usuario</label>
                    <input id="input_user" type="text" style="height: 30px;"/>
                    <label>Password</label>
                    <input id="input_pass" type="password" style="height: 30px;"/>
                    <input id="type_user" type="text"/>
                    <div id="label_error" class="alert alert-error" style="float: right;">Error en usuario o password </div>
                    <br><br>
                </div>
                <div class="modal-footer">
                    <div style="float: left">
                        <!--<a href="javascript: void()" style="float: left">Ingresar como usuario libre</a><br>-->
                    <div id="div_btn_admin"><a class="" id="btn_admin" href="javascript: void(0)" style="float: left">Ingresar como Administrador</a>
</div>              <div id="div_btn_docente"><a class="" id="btn_docente" href="javascript: void(0)" style="float: left">Ingresar como docente</a></div> 
                   
                    </div>
                    <a href="#" id="btn_login" class="btn btn-success">Aceptar</a>
                </div>
                
            </div>


         



        </body>
        <script src="js/bootstrap.min.js"></script> 
    </html>

    <?php
} else {
    
}
?>