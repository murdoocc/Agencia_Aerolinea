<?php
    //Variables: avion, destino, fecha_vuelo, costo, hora_salida
    if( isset($_POST['avion']) && !empty($_POST['avion']) &&
        isset($_POST['destino']) && !empty($_POST['destino']) &&
        isset($_POST['fecha_vuelo']) && !empty($_POST['fecha_vuelo']) &&
        isset($_POST['costo']) && !empty($_POST['costo']) &&
        isset($_POST['hora_salida']) && !empty($_POST['hora_salida'])){
        //instancia de la clase SoapClient
        $client = new SoapClient("http://localhost:8080/ws/aeropuerto.wsdl");
        //definicion y paso de parametros
        $parametros = array("avion" => $_POST['avion'], 
                            "destino" => $_POST['destino'],
                            "fecha_vuelo" => $_POST['fecha_vuelo'],
                            "costo" => $_POST['costo'],
                            "hora_salida" => $_POST['hora_salida']);            
        $response = $client->__soapCall('addDestino', array($parametros));
        print "<h1 id='prueba'>". $response->{'save_destino'} . "</h1>";
        header("Location: http://localhost/Servicio_Aeropuerto/index.html");        

        //print_r($response);
    }
?>