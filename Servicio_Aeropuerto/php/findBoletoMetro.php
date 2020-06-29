<?php

    $boleto = $_REQUEST['idBoleto'];

    if( isset($_REQUEST['idBoleto']) && !empty($boleto) ){

        $client = new SoapClient("http://3.91.49.75:8080/ProyectoMetro.wsdl");
        $parametros = array("idBoleto" => $boleto); 
		$response = $client->__soapCall("ConsultarBoleto", array($parametros));		

		//Variable que guarda todo el formato html para inyectar
		$primarycard = "";

		//la clase 'card-deck de bootstrap tiene que englobar las cartas de 3 en 3'
        $cadatres = 2;
        
        $origen = $response->{'estacionOrigen'};
        $destino = $response->{'estacionDestino'};
        $vagon = $response->{'elegirVagon'};

		/*foreach($resultado as $val){
			if($cadatres == -1){
				$primarycard .= "</div>";
				$primarycard .= "<br><br>";
				$cadatres = 2;
			}
			if($cadatres == 2){
				$primarycard .= "<div class='card-deck'>";			
			}*/
			$primarycard .="<div class='row text-center login-page'>";
				$primarycard .= "<div class='card' style='width: 18rem;'>";
				//$primarycard .= "<img src='images/Moscu/1.jpg' class='card-img-top' alt='...''>";
				$primarycard .= "<div class='card-body'>";
				$primarycard .= "<h5 class='card-title'>Boleto de $origen a $destino </h5>";
				$primarycard .= "<h6 class='card-subtitle mb-2 text-muted'>Comprado como vagon $vagon </h6>";
				$primarycard .= "</div>";		
				$primarycard .= "<div class='card-footer'>";
				$primarycard.="<form action='http://localhost/Servicio_Aeropuerto/php/delBoletoMetro.php' method='post'>";
				$primarycard.="<input type='hidden' name='bole' value='$boleto'/>";
				$primarycard .= "<button type='submit' class='btn btn-primary'>¿Cancelar boleto?</button>";
				$primarycard.="</form>";
				$primarycard .= "</div>";
				$primarycard .= "</div>";				
			$primarycard .= "</div>";				

			//$cadatres -= 1;
			
		//}
		
    }
		
    echo $primarycard;
    
	
		
?>
