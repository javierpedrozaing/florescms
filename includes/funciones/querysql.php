<?php 
 	
  $page_title = 'Flores';
 
  // Checkin What level user has permission to view this page
   #page_require_level(2);
  $flores = get_products();
  
?>
<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
	<h3>FLORES DESTACADAS</h3>
<?php foreach ($flores as $flor) : ?>
<a href="detail.php?flor_id=<?php echo $flor['id']; ?>">	
  <div class="col-xs-6 col-md-4 content_products" >	  	  
 	<div class="wrapper">
		<div class="box">
		<?php if($flor['imagen_id'] === '0'): ?>
			<img class="img-avatar img-circle" src="img/no_image.jpg" alt="">
		<?php else: ?>
			<img class="img_product" src="admin/uploads/products/<?php echo $flor['image'];?>">	
		<?php endif; ?>			
			<p><?php echo $flor["nombre"]; ?> </p>			
			<p><?php echo $flor["categoria"]; ?> </p>			
		</div>
	</div>
  </div>
</a>
<?php endforeach; ?>
</div>


