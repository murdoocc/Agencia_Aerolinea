<?php

    $destino = $_REQUEST['destino'];

    if( isset($_REQUEST['destino']) && !empty($destino) ){

        $client = new SoapClient("http://localhost:8080/ws/aeropuerto.wsdl");
        $parametros = array("nombredes" => $destino); 
		$response = $client->__soapCall("findDestino", array($parametros));
		$resultado = array_values($response->{'vuelo'});

		//Variable que guarda todo el formato html para inyectar
		$primarycard = "";

		//la clase 'card-deck de bootstrap tiene que englobar las cartas de 3 en 3'
		$cadatres = 2;

		foreach($resultado as $val){
			if($cadatres == -1){
				$primarycard .= "</div>";
				$primarycard .= "<br><br>";
				$cadatres = 2;
			}
			if($cadatres == 2){
				$primarycard .= "<div class='card-deck'>";			
			}
				$x = $val->{"avion"};
				$xxx = $val->{"coste"};
				$xxxx = $val->{"fecha_salida"};
				$xxxxx = $val->{"hora_salida"};

				$primarycard .= "<div class='card'>";
				$primarycard .= "<img src='images/$destino.jpg' class='card-img-top' alt='...''>";
				$primarycard .= "<div class='card-body'>";
				$primarycard .= "<h5 class='card-title'>Viaja a $destino</h5>";
				$primarycard .= "<h6 class='card-subtitle mb-2 text-muted'>Con un costo de $xxx</h6>";
				$primarycard .= "<p class='card-text'>El cual sale el día $xxxx a las $xxxxx hrs</p>";
				$primarycard .= "</div>";		
				$primarycard .= "<div class='card-footer'>";
				$primarycard.="<form action='http://localhost/Servicio_Aeropuerto/addBoleto.php' method='post'>";
				$primarycard.="<input type='text' name='destino' value='$destino' style='display:none'/>";
				$primarycard.="<input type='text' name='coste' value='$xxx' style='display:none'/>";
				$primarycard.="<input type='text' name='fecha' value='$xxxx' style='display:none'/>";
				$primarycard.="<input type='text' name='hora' value='$xxxxx' style='display:none'/>";				
				$primarycard.="<input type='text' name='avion' value='$x' style='display:none'/>";
				$primarycard .= "<button type='submit' class='btn btn-primary'>Comprar</button>";
				$primarycard.="</form>";
				$primarycard .= "</div>";
				$primarycard .= "</div>";				

			$cadatres -= 1;
			
		}
		
    }
		
    echo $primarycard;
    
	
		
?>
