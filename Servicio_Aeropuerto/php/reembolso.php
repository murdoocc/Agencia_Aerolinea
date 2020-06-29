<?php
    if( isset($_POST['coste']) && !empty($_POST['coste']) &&  
        isset($_POST['tarjeta']) && !empty($_POST['tarjeta'])){        
        

        //instancia de la clase SoapClient BANCO
        $client2 = new SoapClient("http://3.83.142.54:8080/banco.wsdl");
        //definicion y paso de parametros
        $parametros = array(
                            "tarjeta" => $_POST['tarjeta'],                         
                            "monto" => $_POST['coste']);            
        $response2 = $client2->__soapCall('Reembolso', array($parametros));        

        echo "<script language='javascript'>alert('Solicitud enviada y recibida, espere la reintegración de su dinero, Gracias por volar en AERO-TEC');</script>";

        echo "<script> window.location.href = 'http://localhost/Servicio_Aeropuerto/index.html'; </script>";

        //header("Location: http://localhost/Servicio_Aeropuerto/index.html");        

        /*
        //instancia de la clase SoapClient AEROLINEA
        $client1 = new SoapClient("http://localhost:8080/ws/aeropuerto.wsdl");
        //definicion y paso de parametros
        $parametros = array("nombre" => $_POST['nombre'],
                            "num_cuenta" => $_POST['tarjeta'],
                            "ccv" => $_POST['ccv'],
                            "fecha_tarjeta" => $_POST['fecha'],
                            "monto" => $_POST['coste'],
                            "idboleto" => $_POST['boleto']);            
        $response1 = $client1->__soapCall('payVuelo', array($parametros));

        
        */
    }
?>