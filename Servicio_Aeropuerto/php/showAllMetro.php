<?php

    $linea = $_REQUEST['linea'];
	//Se crea una instancia de un cliente soap
	$client = new SoapClient("http://3.91.49.75:8080/ProyectoMetro.wsdl");
	$parametros = array('linea' => $linea); 
    $response = $client->__soapCall("ListaEstaciones", array($parametros));
    
    $resultado = $response->{'nombre'};
    $precio = $response->{'precio'};
    $zona = $response->{'zona'};

	//Variable que guarda todo el formato html para inyectar
    $primarycard = "";
    
    $frag = explode(",", $resultado);   

    

	//la clase 'card-deck de bootstrap tiene que englobar las cartas de 3 en 3'
    $cadatres = 2;
    $i=0;
    $tam=sizeof($frag);

    $primarycard .= "<h4>La tarifa de esta linea es de $precio</h4>";
    for($i; $i<$tam; $i++){
        if($cadatres == -1){
            $primarycard .= "</div>";
            $primarycard .= "<br><br>";
            $cadatres = 2;
        }
        if($cadatres == 2){
            $primarycard .= "<div class='card-deck'>";			
        }      
            
            $primarycard .= "<div class='card'>";
            $primarycard .= "<img src='images/$zona/$i.jpg' class='card-img-top' alt='...' height='200px'>";
            $primarycard .= "<div class='card-body row'>";            
            $primarycard .= "<h5>$frag[$i]</h5> <button onClick='elegirOrigen(this.value)' value='$frag[$i]+$precio'>Origen</button>";
            $primarycard .= "<button onClick='elegirDestino(this.value)' value='$frag[$i]'>Destino</button>";            
            $primarycard .= "</div>";		
            $primarycard .= "</div>";            
            $cadatres -= 1;        
            
        
    }
    
	echo $primarycard;

	
?>

