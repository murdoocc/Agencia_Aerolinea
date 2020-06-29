<?php

	//Se crea una instancia de un cliente soap
	$client = new SoapClient("http://localhost:8080/ws/aeropuerto.wsdl");
	$parametros = array('' => ''); 
	$response = $client->__soapCall("findAllDestino", array($parametros));
	$resultado = array_values($response->{'vuelo'});

	$user="";
	//Se verifica la sesión que esta actualmente
	// Continuamos la sesión
	session_start();
	// Devolver los valores de sesión
	if(!empty($_SESSION["usuario"]))
		$user = $_SESSION["usuario"];

	//Variable que guarda todo el formato html para inyectar
	$primarycard = "";

	//la clase 'card-deck de bootstrap tiene que englobar las cartas de 3 en 3'
	$cadatres = 2;

	if($user == "john"){
		$primarycard.="<div class='form-row'>";
		$primarycard.="<div class='form-group col-md-4'>";
		$primarycard.="<form action='http://localhost/Servicio_Aeropuerto/php/destroySesion.php'>";	
		$primarycard.="<button type='submit' class='btn btn-outline-danger'>Cerrar sesión de administrador</button>";
		$primarycard.="</form>";
		$primarycard.="</div>";	
		$primarycard.="<div class='form-group col-md-4'>";
		$primarycard.="<a class='btn btn-outline-primary' href='addDestino.html' role='button'>Agregar un nuevo destino</a>";		
		$primarycard.="</div>";
		$primarycard.="<div class='form-group col-md-4'>";
		$primarycard.="<a class='btn btn-outline-warning' href='Aviones.html' role='button'>Administrar aviones de AERO-TEC</a>";
		$primarycard.="</div>";
		$primarycard.="</div>";	

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
				$xx = $val->{"destino"};
				$xxx = $val->{"coste"};
				$xxxx = $val->{"fecha_salida"};
				$xxxxx = $val->{"hora_salida"};

				$primarycard .= "<div class='card'>";
				$primarycard .= "<img src='images/$xx.jpg' class='card-img-top' alt='...''>";
				$primarycard .= "<div class='card-body'>";
				$primarycard .= "<h5 class='card-title'>Viaja a $xx</h5>";
				$primarycard .= "<h6 class='card-subtitle mb-2 text-muted'>Con un costo de $xxx</h6>";
				$primarycard .= "<p class='card-text'>El cual sale el día $xxxx a las $xxxxx hrs</p>";
				$primarycard .= "</div>";		
				$primarycard .= "<div class='card-footer'>";
				$primarycard.="<form action='http://localhost/Servicio_Aeropuerto/php/deleteFly.php' >";
				$primarycard.="<input type='text' name='avion' value='$x' style='display:none'/>";
				$primarycard.="<button type='submit' class='btn btn-danger'>Eliminar vuelo</button>";
				$primarycard.="</form>";
				$primarycard .= "</div>";
				$primarycard .= "</div>";

			$cadatres -= 1;
			
		}
	}else{

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
				$xx = $val->{"destino"};
				$xxx = $val->{"coste"};
				$xxxx = $val->{"fecha_salida"};
				$xxxxx = $val->{"hora_salida"};

				$primarycard .= "<div class='card'>";
				$primarycard .= "<img src='images/$xx.jpg' class='card-img-top' alt='...''>";
				$primarycard .= "<div class='card-body'>";
				$primarycard .= "<h5 class='card-title'>Viaja a $xx</h5>";
				$primarycard .= "<h6 class='card-subtitle mb-2 text-muted'>Con un costo de $xxx</h6>";
				$primarycard .= "<p class='card-text'>El cual sale el día $xxxx a las $xxxxx hrs</p>";
				$primarycard .= "</div>";		
				$primarycard .= "<div class='card-footer'>";
				$primarycard.="<form action='http://localhost/Servicio_Aeropuerto/addBoleto.php' method='post'>";
				$primarycard.="<input type='text' name='destino' value='$xx' style='display:none'/>";
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
	/*
	print "<br>";
	print "Un avion $x con destino a $xx tiene un costo de $xxx, el cual sale el dia $xxxx a las $xxxxx hrs";
	print "<br>";
	print "<br>";
	print "<br>";
	print_r($response);
	
	
	/* Formato a devolver */
	/*
	$primarycard = "<div class='card-deck'>";
	$primarycard .= "<div class='card'>";
	$primarycard .= "<img src='images/tijuanaa.jpg' class='card-img-top' alt='...''>";
	$primarycard .= "<div class='card-body'>";
	$primarycard .= "<h5 class='card-title'>Card title</h5>";
	$primarycard .= "<h6 class='card-subtitle mb-2 text-muted'>Card subtitle</h6>";
	$primarycard .= "<p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>";
	$primarycard .= "</div>";		
	$primarycard .= "<div class='card-footer'>";
	$primarycard .= "<a href='#' class='btn btn-primary'>Go somewhere</a>";
	$primarycard .= "<small class='text-muted'>Last updated 3 mins ago</small>";
	$primarycard .= "</div>";
	$primarycard .= "</div>";
	$primarycard .= "</div>";
	*/
	
	echo $primarycard;

	
?>

