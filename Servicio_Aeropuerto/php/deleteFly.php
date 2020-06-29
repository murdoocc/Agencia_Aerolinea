<?php
    //Variables: avion, destino, fecha_vuelo, costo, hora_salida
    if( isset($_REQUEST['avion']) && !empty($_REQUEST['avion']) ){
        //instancia de la clase SoapClient
        $client = new SoapClient("http://localhost:8080/ws/aeropuerto.wsdl");
        //definicion y paso de parametros
        $parametros = array("avion" => $_REQUEST['avion']);            
        $response = $client->__soapCall('delDestino', array($parametros));
        print "<h1 id='prueba'>". $response->{'delete_destino'} . "</h1>";
        header("Location: http://localhost/Servicio_Aeropuerto/index.html");        

        //print_r($response);
    }
?>