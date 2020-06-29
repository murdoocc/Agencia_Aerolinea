<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/Servicio_Aeropuerto/index.html");

?>