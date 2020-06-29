<?php
    $idBoleto = $_POST['bole'];
	//Se crea una instancia de un cliente soap
	$client = new SoapClient("http://3.91.49.75:8080/ProyectoMetro.wsdl");
	$parametros = array('idBoleto' => $idBoleto); 
    $response = $client->__soapCall("CancelarBoleto", array($parametros));

    echo "<script language='javascript'>alert('Boleto cancelado, Gracias por usar el servicio de Metro en AERO-TEC');</script>";
    echo "<script> window.location.href = 'http://localhost/Servicio_Aeropuerto/index.html'; </script>";
?>