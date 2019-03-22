<?php 
 	
  $page_title = 'Flores';

  $flores = get_products();  
?>
<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
	<h3>FLORES DESTACADAS</h3>
<?php foreach ($flores as $flor) : ?>

  <div class="col-xs-6 col-md-3 content_products" >	  	  
	<a href="detail.php?flor_id=<?php echo $flor['id']; ?>">	
		<div class="wrapper">
			<div class="box">
				<?php if($flor['image'] === '0'): ?>
					<img class="img-avatar img-circle" src="img/no_image.jpg" alt="">
				<?php else: ?>
					<img class="img_product" src="admin/uploads/products/<?php echo $flor['image'];?>">	
				<?php endif; ?>			
					<p><?php echo $flor["nombre"]; ?> </p>						
					<p><?php echo "$" . $flor["precio"]; ?> </p>					
			</div>			
		</div>
		</a>
	<!--	<a href="" class="btn btn-primary btn-lg add_cart" href="#" role="button">AGREGAR AL CARRITO</a> -->
  </div>

<?php endforeach; ?>
</div>


