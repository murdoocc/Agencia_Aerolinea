<?php
    //Variables del boleto: nombre, destino, coste, sala, asiento, fecha, avion, hora
    if( isset($_POST['nombre']) && !empty($_POST['nombre']) &&
        isset($_POST['destino']) && !empty($_POST['destino']) &&
        isset($_POST['coste']) && !empty($_POST['coste']) &&
        isset($_POST['sala']) && !empty($_POST['sala']) &&
        isset($_POST['asiento']) && !empty($_POST['asiento']) &&
        isset($_POST['fecha']) && !empty($_POST['fecha']) &&
        isset($_POST['avion']) && !empty($_POST['avion']) &&
        isset($_POST['hora']) && !empty($_POST['hora'])){
        //instancia de la clase SoapClient
        $client = new SoapClient("http://localhost:8080/ws/aeropuerto.wsdl");
        //definicion y paso de parametros
        $parametros = array("nombre" => $_POST['nombre'], 
                            "destino" => $_POST['destino'],
                            "coste" => $_POST['coste'],
                            "sala" => $_POST['sala'],
                            "asiento" => $_POST['asiento'],
                            "fecha" => $_POST['fecha'],
                            "avion" => $_POST['avion'],
                            "hora" => $_POST['hora']);            
        $response = $client->__soapCall('addPasajero', array($parametros));
        //Tengo que recuperar el id del boleto que estoy generando, para que dicho boleto
        //haga referencia a mi pago
        print "<h1>". $response->{'datos'} . "</h1>";
        $name=$_POST['nombre'];
        $cost=$_POST['coste'];
        $id=$response->{'datos'};
        header("Location: http://localhost/Servicio_Aeropuerto/payBoleto.html?nombre=$name&coste=$cost&boleto=$id");

        //print_r($response);
    }
?>