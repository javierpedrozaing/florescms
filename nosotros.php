<?php include_once 'includes/templates/header2.php';?>

<!--CALENDARIO-->
<!--------------------------------------------------------------------------------->
<div class="linea contenedor">
    <p></p>
  </div>
<!--------------------------------------------------------------------------------->

<section  class="seccion">
    <h2>NOSOTROS</h2>
    <div class="contenedor">
  
    </div>
  </section>
<section class="contenedor-nosotros">
    <div class="contenedor clearfix">
        <article class="contenedor-nosotros clearfix">
            <img src="img/Corazon-Woo-1x1.jpg" alt="Imagen Puente De la torre">
            <br>
            <p>Somos un equipo de personas que nos encantan las flores y para quienes las combinaciones de flores se estaban volviendo algo muy común, las flores del día busca la satisfacción del cliente tanto en calidad como en su dedicación y amor en el proceso de producción de los ramos.
                <br><br>Quien buscan la variedad y salir de la cotidianidad en regalar flores las cuales son más que un te quiero o un porque si … es amor en una flor.</p>
        </article>
    </div>
</section>

<style type="text/css">
    .zoom{
        /* Aumentamos la anchura y altura durante 2 segundos */
        transition: width 2s, height 2s, transform 2s;
        -moz-transition: width 2s, height 2s, -moz-transform 2s;
        -webkit-transition: width 2s, height 2s, -webkit-transform 2s;
        -o-transition: width 2s, height 2s,-o-transform 2s;
    }
    .zoom:hover{
        /* tranformamos el elemento al pasar el mouse por encima al doble de
           su tamaño con scale(2). */
         transform : scale(1.2);
        -moz-transform : scale(1.2);      /* Firefox */
        -webkit-transform : scale(1.2);   /* Chrome - Safari */
        -o-transform : scale(1.2);        /* Opera */
    }
</style>

<section class="conocenos seccion contenedor clearfix">
  <h2>CONOCENOS</h2>
  <ul class="lista-conocenos clearfix">
      <li>
          <div class="invitado">
            <img class="zoom" src="img/Foto-Andres.jpg" alt="imagen andres">
            
            <h3>Andres Angel</h3>
            <p>La fuerza bruta de la empresa</p>
          </div>
      </li>
      <li>
          <div class="invitado">
              <img class="zoom" src="img/Foto-Cata.jpg" alt="imagen cata">
     
              <h3>Catalina Correra</h3>
              <p>La disque diseñadora</p>
            </div>
      </li>
      <li>
          <div class="invitado">
              <img  class="zoom" src="img/Foto-Felipe-1.jpg" alt="imagen felipe">
             
              <h3>Felipe Romero</h3>
              <p>El maleteador Online</p>
            </div>
      </li>
  </ul>
</section>
<?php include_once 'includes/templates/footer.php';?>