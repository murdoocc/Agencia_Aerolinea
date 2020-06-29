<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AERO-TEC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleIndex.css">
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">
            <img src="images/header-text.png" width="100" height="45" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="findBoleto.html">Buscar mi boleto</a>
              </li>
            </ul>            
          </div>
        </nav>
    </header>    
    <br>   
    <div class="container">
    <?php
        $preform = '';
        //Variables del boleto: nombre, destino, coste, sala, asiento, fecha, avion, hora
        if( isset($_POST['destino']) && !empty($_POST['destino']) &&
            isset($_POST['coste']) && !empty($_POST['coste']) &&
            isset($_POST['fecha']) && !empty($_POST['fecha']) &&
            isset($_POST['hora']) && !empty($_POST['hora'] &&
            isset($_POST['avion']) && !empty($_POST['avion']))){         

            $destino = $_POST['destino'];
            $coste = $_POST['coste'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $avion = $_POST['avion'];            

            $preform.="<form action='http://localhost/Servicio_Aeropuerto/php/addBoletoPart2.php' method='post'>";
            $preform.="<div class='form-group'>";
            $preform.="<label for='nombre'>Nombre completo</label>";
            $preform.="<input type='text' class='form-control' id='nombre' placeholder='Escribe tu nombre completo...' name='nombre'>";
            $preform.="</div>";
            $preform.="<div class='form-row'>";
            $preform.="<div class='form-group col-md-6'>";
            $preform.="<label for='destino'>Destino de tu avion</label>";
            $preform.="<input type='text' class='form-control' id='destino' name='destino' placeholder='$destino' value='$destino' readonly>";
            $preform.="</div>";
            $preform.="<div class='form-group col-md-6'>";
            $preform.="<label for='coste'>El precio de tu vuelo</label>";
            $preform.="<input type='text' class='form-control' id='coste' name='coste' placeholder='$coste' value='$coste' readonly>";
            $preform.="</div>";
            $preform.="</div>";
            $preform.="<div class='form-group'>";
            $preform.="<label for='sala'>Salas disponibles</label>";
            $preform.="<select id='sala' name='sala' class='form-control'>";
            $preform.="<option selected>Selecciona la sala...</option>";
            $preform.="<option>VIP</option>";
            $preform.="<option>Sencilla</option>";
            $preform.="</select>";
            $preform.="</div>";
            $preform.="<div class='form-group'>";
            $preform.="<label for='asiento'>El numero de asiento que gustes...</label>";
            $preform.="<input type='text' class='form-control' id='asiento' name='asiento' placeholder='Este avión cuenta con un intervalo de asientos de x a y'>";
            $preform.="</div>";
            $preform.="<div class='form-row'>";
            $preform.="<div class='form-group col-md-4'>";
            $preform.="<label for='fecha'>La fecha de vuelo</label>";
            $preform.="<input type='text' class='form-control' id='fecha' name='fecha' placeholder='$fecha' value='$fecha' readonly>";
            $preform.="</div>";
            $preform.="<div class='form-group col-md-4'>";
            $preform.="<label for='avion'>Nombre del avión</label>";
            $preform.="<input type='text' class='form-control' id='avion' name='avion' placeholder='$avion' value='$avion' readonly>";
            $preform.="</div>";
            $preform.="<div class='form-group col-md-4'>";
            $preform.="<label for='hora'>La hora de vuelo</label>";
            $preform.="<input type='text' class='form-control' id='hora' name='hora' placeholder='$hora hrs' value='$hora' readonly>";
            $preform.="</div>";
            $preform.="</div>";
            $preform.="<button type='submit' class='btn btn-primary'>Confirmar datos</button>";
            $preform.="</form>";
            
        }

        echo $preform;
        ?>
        
    </div>

</body>
</html>