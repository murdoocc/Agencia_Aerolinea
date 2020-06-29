<?php

    if( isset($_POST['usuario']) && !empty($_POST['usuario']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        $user = $_POST['usuario'];
        $pass =  $_POST['password'];
        if($user=="john" && $pass =="123456"){
            session_start();
            // Guardar datos de sesión
            $_SESSION["usuario"] = "john";            
            header("Location: http://localhost/Servicio_Aeropuerto/index.html");
        }else{
            header("Location: http://localhost/Servicio_Aeropuerto/index.html");
        }        
    
    }

?>