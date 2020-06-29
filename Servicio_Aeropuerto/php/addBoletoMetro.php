<?php
    //Variables: avion, destino, fecha_vuelo, costo, hora_salida
    if( isset($_POST['idBoleto']) && !empty($_POST['idBoleto']) &&
        isset($_POST['origen']) && !empty($_POST['origen']) &&
        isset($_POST['destino']) && !empty($_POST['destino']) &&
        isset($_POST['fecha']) && !empty($_POST['fecha']) &&
        isset($_POST['vagon']) && !empty($_POST['vagon']) &&
        isset($_POST['precio']) && !empty($_POST['precio']) &&
        isset($_POST['pago']) && !empty($_POST['pago'])){
        //instancia de la clase SoapClient
        $client = new SoapClient("http://3.91.49.75:8080/ProyectoMetro.wsdl");

        //Cambiar formato de la fecha de DD/MM/YYYY a YYYY-MM-DD 
        $date = explode("/", $_POST['fecha']);
        $newDate = $date[2]."-".$date[1]."-".$date[0];

        //definicion y paso de parametros
        $parametros = array("idBoleto" => $_POST['idBoleto'], 
                            "fechaPartida" => $newDate,
                            "estacionOrigen" => $_POST['origen'],
                            "estacionDestino" => $_POST['destino'],
                            "elegirVagon" => $_POST['vagon'],
                            "ingresaMetodoPago" => $_POST['pago']);            
        $response = $client->__soapCall('ComprarBoleto', array($parametros));
        print "<script>alert(". $response->{'respuesta'} . ");</script>";
        header("Location: http://localhost/Servicio_Aeropuerto/index.html");        

        //print_r($response);
    }
?>