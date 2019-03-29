
<?php
include_once '../../admin/includes/load.php';
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('America/Bogota');

$fecha = $_POST['fecha']; 

$date =  date_create($fecha);

?>
<p hidden><?php print_r($date); ?>  </p>


<?php
$year = explode("-", $date->date)[0];
$month = explode("-", $date->date)[1];
$day = substr(explode("-", $date->date)[2], 0,2);

$getFlores = join_product_table_ajax($day, $month);

if (count($getFlores) == 0) {
	$getFlores = join_product_table_ajax_before_data($day, $month);
}
?>


<?php if (!empty($getFlores)) : ?>
<?php foreach ($getFlores as $flor) : ?>
<div class="col-xs-6 col-md-3 content_products" >	  	  
  	<a href="detail.php?flor_id=<?php echo $flor['id']; ?>">	
	  <div class="wrapper">
		  <div class="box">
			  <?php if($flor['imagenprincipal'] === '0'): ?>
				  <img class="img-avatar img-circle" src="img/no_image.jpg" alt="">
			  <?php else: ?>
				  <img class="img_product" src="admin/uploads/products/<?php echo $flor['imagenprincipal'];?>">	
			  <?php endif; ?>			
				  <p><?php echo $flor["nombre"]; ?> </p>						
				  <p><?php echo "$" . $flor["precio"]; ?> </p>					
		  </div>			
	  </div>
	</a>
  <!--	<a href="" class="btn btn-primary btn-lg add_cart" href="#" role="button">AGREGAR AL CARRITO</a> -->
</div>

<?php endforeach; ?>
<?php else: ?>
<p> No se encontraron resultados </p>
<?php endif; ?>
