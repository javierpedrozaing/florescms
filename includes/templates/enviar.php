
  <?php
$destino= "gonzalezalejandro1010@hotmail.com";
$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$telefono= $_POST["telefono"];
$mensaje= $_POST["mensaje"];

$contenido= "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nTeléfono: " .$telefono . "\nMensaje: " . $mensaje;

mail($destino, "Contacto", $contenido);

header("Location:contactanos.php");

?>

  <body>
 
  
  <div class="clearfix">
  <form action="includes/templates/enviar.php" method="post">
  <p class="intro">Puedes ponerte en contacto con nosotros por cualquiera de los siguientes medios, o visítanos en nuestra oficina.</p>
  
  <hr>
  
  <div class="row clearfix">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <h2>Contáctanos</h2>
        
        <input type="text" name="nombre" placeholder="Nombre" required>
        
        <input type="text" name="correo" placeholder="Correo" required>
         
        <input type="text" name="telefono" placeholder="Teléfono" required>
                    
        <textarea name="mensaje" placeholder="Escriba aquí su mensaje" required></textarea>
  		<p></p>
    		<input type="submit" value="Enviar" id="boton">
      </div>
      
      <div id="informacion"class="col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
      <h2>Datos De Contacto</h2>
      <br>		
      
      <h5>DIRECCIÓN DE LA OFICINA</h5>
      <p class="info">Carrera 15 No. 80-36 Oficina 102, Bogota</p>
      <h5>EMAIL</h5>
      <p class="info">contacto@floresdeldia.com</p>
      <h5>TELÉFONO</h5>
      <p class="info">312.465.7789</p>
      <h5>HORARIO</h5>
      <p class="info">Lunes a Viernes: 6am to 8pm <br>Sabado: 7am to 4pm <br> Domingos y Festivos: Sin Atención</p>
    </div>
    
  </form>
  </div>
    <br>
    <br>
    
   
  <!--------------------------- FN FORMULARIO DE CONTACTO---------------------------->














  
  
  