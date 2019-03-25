

<?php
$destino= "gbarboza.es@gmail.com";
$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$telefono= $_POST["telefono"];
$mensaje= $_POST["mensaje"];

$contenido= "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nTeléfono: " .$telefono . "\nMensaje: " . $mensaje;

mail($destino, "Contacto", $contenido);

//header("Location:contactos.html");



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
	<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
	<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/estilos_contactos.css">
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body>
  
  
  <div class="container">
  
  
<form action="enviar.php" method="post">
  <h2>Contacte con nosotros</h2>
  
  <p class="intro">Agradecemos el interés por contactarse con nosotros, si desea recibir mayor información sobre alguno de nuestros servicios o productos, por favor rellene el siguiente formulario y enseguida estaremos respondiendo.</p>
  
  <hr>
  
  <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
   
        
        <input type="text" name="nombre" placeholder="Nombre" required>
        
        <input type="text" name="correo" placeholder="Correo" required>
         
        <input type="text" name="telefono" placeholder="Teléfono" required>
          
         <input type="text" name="empresa" placeholder="Empresa Opcional">
          
        <textarea name="mensaje" placeholder="Escriba aquí su mensaje" required></textarea>
  		<p></p>
    		<input type="submit" value="Enviar" id="boton">
      </div>
      
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      		
      <br>		
		<p class="info"><strong>¿Deseas un Sitio Web?</strong> Ponte en contacto con nosotros a través de este formulario.</p>

	    <p class="info">Desarrollamos Sitios Web adaptables a cualquier dispositivo utilizando para ello <strong> HTML5, CSS3, Bootstrap, Javascript y JQuery</strong>. Visita nuestro canal !!! ahí podrás encontrar recusos sobre Diseño y Desarrollo Web.</p>
	    
      <img src="imagenes/img_contacto2.jpg" class="img-rounded img-responsive" alt="Placeholder image"> </div>
    </div>
    
  </form>
  <br>
  <br>
  
  </div>
  
  
</body>
</html>