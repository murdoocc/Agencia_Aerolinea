<?php

//file_get_contents = Esta función recibe como parámetro el nombre del archivo que se quiere leer y devuelve todo su contenido como un string.
//php en realidad entiende a los archivos como flujos. Por lo tanto, si está todo bien configurado, una URL puede usarse como nombre de un flujo.
//Cuando es TRUE, los object devueltos serán convertidos a array asociativos. 
$res = json_decode( file_get_contents("http://localhost:8080/Servicio_Aeropuerto/Aviones"), true);
//print_r($res);
$vista="";
$cadatres = 2;

/*<div class="card" style="width: 18rem;">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>*/

for($i=0; $i<count($res); $i++){
    if($cadatres == -1){
        $vista .= "</div>";
        $vista .= "<br><br>";
        $cadatres = 2;
    }
    if($cadatres == 2){
        $vista .= "<div class='card-deck'>";			
    }
    $vista .= "<div class='card bg-info' style='width: 18rem;'>";
        $vista .= "<div class='card-header'>";
            $vista .= "Avion ".$res[$i]['nombre_avion'];
        $vista .= "</div>";
        $vista .="<ul class='list-group list-group-flush'>";
            $vista .="<li class='list-group-item'>ID: ".$res[$i]['id']."</li>";
            $vista .="<li class='list-group-item'>Tipo de sala: ".$res[$i]['num_asiento']."</li>";           
            $vista .="<li class='list-group-item'>Tipo de sala: ".$res[$i]['tipo_sala']."</li>";
            $vista .="<li class='list-group-item'>Tipo de sala: ".$res[$i]['tipo']."</li>";
            $vista .="<li class='list-group-item'><form action='http://localhost:8080/Servicio_Aeropuerto/Aviones/eliminar' method='POST' modelAttribute='delAvionForm'>
                <input type='hidden' name='id' value='".$res[$i]['id']."'>
                <input type='hidden' name='nombre_avion' value='".$res[$i]['nombre_avion']."'>
                <input class='btn btn-danger' type='submit' value='Eliminar'></form>"."</li>";
        $vista .="</ul>";
    $vista .= "</div>";
    $cadatres -= 1;
}

echo $vista;

?>