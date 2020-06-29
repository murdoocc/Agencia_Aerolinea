<?php

    $primarycard = "";

    $nombre = $_REQUEST['nombre'];
    $fecha = $_REQUEST['fecha'];

    if( isset($_REQUEST['nombre']) && !empty($nombre) ){

        $client = new SoapClient("http://localhost:8080/ws/aeropuerto.wsdl");
        $parametros = array("nombre" => $nombre, "fecha" => $fecha); 
		$response = $client->__soapCall("showPasajero", array($parametros));
        $nom = $response->{'nombre'};
        $destino = $response->{'destino'};
        $costo = $response->{'costo'};
        $sala = $response->{'sala'};
        $asiento = $response->{'asiento'};
        $fecha = $response->{'fecha'};
        $avion = $response->{'avion'};
        $hora = $response->{'hora'};

		//Variable que guarda todo el formato html para inyectar
		

		//la clase 'card-deck de bootstrap tiene que englobar las cartas de 3 en 3'
		//$cadatres = 2;

		//foreach($resultado as $val){
		//	if($cadatres == -1){
		//		$primarycard .= "</div>";
		//		$primarycard .= "<br><br>";
		//		$cadatres = 2;
		//	}
		//	if($cadatres == 2){
		//		$primarycard .= "<div class='card-deck'>";			
        //	}
        $linea = 0;
        if($destino=="Londres"){
            $linea=2;
        }else if($destino=="Moscu"){
            $linea=7;
        }
                $primarycard .= "<br><br>";
                $primarycard .= "<div class='card-deck'>";
				$primarycard .= "<div class='card'>";
				$primarycard .= "<img src='images/$destino.jpg' class='card-img-top' alt='Esta imagen hace referencia a $destino'>";
				$primarycard .= "<div class='card-body'>";
				$primarycard .= "<h5 class='card-title'>Boleto</h5>";				
                $primarycard .= "<p class='card-text'>Pasajero: $nom</p>";
                $primarycard .= "<p class='card-text'>Destino: $destino</p>";
                $primarycard .= "<p class='card-text'>Costo: $costo</p>";
                $primarycard .= "<p class='card-text'>Sala: $sala</p>";
                $primarycard .= "<p class='card-text'>Asiento: $asiento</p>";
                $primarycard .= "<p class='card-text'>Fecha: $fecha</p>";
                $primarycard .= "<p class='card-text'>Hora: $hora hrs</p>";
                $primarycard .= "<p class='card-text'>Avion: $avion</p>";
				$primarycard .= "</div>";		
				$primarycard .= "<div class='card-footer'>";
                $primarycard .= "<a href='index.html' class='btn btn-primary'>Imprimir</a>";				
                $primarycard .= "<a href='reembolso.html?coste=$costo' class='btn btn-danger'>Perdir reembolso</a>";
                $primarycard .= "<a href='metro.html?linea=$linea' class='btn btn-warning'>Metro de $destino</a>";
				$primarycard .= "</div>";
                $primarycard .= "</div>";
                $primarycard .= "</div>";

		//	$cadatres -= 1;
			
		//}
		
    }
		
    echo $primarycard;
    
	
		
?>
