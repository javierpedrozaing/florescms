<?php include_once 'includes/templates/header2.php';?>
<!--CALENDARIO-->
<!--------------------------------------------------------------------------------->
<div class="linea contenedor">
    <p></p>
  </div>
<!--------------------------------------------------------------------------------->

  <section class="seccion">
      <h2>CONTACTANOS</h2>
      <div class="contenedor">
          <iframe id="mapa"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.589816352483!2d-74.05700758007494!3d4.666986061437305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9af59b59b5dd%3A0x1ef37fb083eb59ce!2sAk.+15+%2380-36%2C+Bogot%C3%A1!5e0!3m2!1ses-419!2sco!4v1550847209212" width="100%" height="450" frameborder="0"  allowfullscreen></iframe>
      </div>

    </section>
    
   
  <!---------------------------FORMULARIO DE CONTACTO---------------------------->

<div class="clearfix">
  
<form class ="contenedor"action="includes/templates/enviar.php" method="post">
  
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

      
  <!--------------------------- FN FORMULARIO DE CONTACTO---------------------------->



  <?php include_once 'includes/templates/footer.php';?>