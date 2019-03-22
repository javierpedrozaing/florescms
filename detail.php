<?php require  'includes/templates/header.php';?>
<div class="seccion"></div>
<?php include_once 'includes/funciones/connect_db.php';?>

<?php 

$flor_id = $_GET['flor_id']; 
?>

<?php 
$sql = "SELECT f.id as 'id', f.nombre as 'nombre', f.descripcion as 'description', cat.nombre as 'categoria', f.precio as 'precio', img.file_name as 'imagen' FROM flores f
INNER JOIN flores_has_imagen f_img ON f_img.flores_id = f.id
INNER JOIN imagen img ON f_img.imagen_id = img.id
INNER JOIN categorias cat ON f.categorias_id = cat.id
WHERE f.id = $flor_id";

$getFlores = $mysqli->query($sql);	
$flor = mysqli_fetch_assoc($getFlores);

$query_images = "SELECT * FROM imagen img
INNER JOIN flores_has_imagen f_img ON img.id = f_img.imagen_id
INNER JOIN flores fl ON f_img.flores_id = fl.id 
WHERE fl.id = ".$flor["id"];

// $getImages = $mysqli->query($query_images);	
// $images = mysqli_fetch_assoc($getImages);

$images = $db->query($query_images);
$sqlempaques = "SELECT * FROM empaques";
$empaques = $mysqli->query($sqlempaques);
$sqltamanos = "SELECT * FROM tamano";
$tamanos = $mysqli->query($sqltamanos);
?>
<div class="detail container">	
	<div class="row">	    	
	    <div class="col-md-6">	     
	    		<h2><?php echo $flor["nombre"]; ?><span><h5><?php echo $flor["precio"]; ?></h5></span></h2>	    
	    		<img style="margin: 0 140px;" src="admin/uploads/products/<?php echo $flor["imagen"] ?>" alt="">									
	    </div>

	    <div class="col-md-6">
	    	<h3> <?php echo $flor["categoria"]; ?></h3>
	    	<div class="filtros" style="padding:20px; margin:40px 0; ">	
				<div class="empaques">
					<label for="">Selecciona un empaque:</label>
				<select class="form-control name="" id="">
					<?php while($row = mysqli_fetch_assoc($empaques)) { ?> ?>
						<?php foreach($row as $key=>$value) { ?>	
						<?php if ($key == "nombre" ) : ?>	
							<option value=""><?php echo $value; ?></option>
						<?php endif; ?>
						<?php }  ?>
					<?php }  ?>
				</select>
				</div>
				<div class="tamanos">
				<label for="">Selecciona un tamaño:</label>
				<select class="form-control" name="" id="">
					<?php while($row = mysqli_fetch_assoc($tamanos)) { ?> ?>
						<?php foreach($row as $key=>$value) { ?>	
						<?php if ($key == "nombre" ) : ?>	
							<option value=""><?php echo $value; ?></option>
						<?php endif; ?>
						<?php }  ?>
					<?php }  ?>

				</select>
				</div>
				<a href="" class="btn btn-primary btn-lg add_cart" href="#" role="button">AGREGAR AL CARRITO</a>
			</div>
	    </div>

	</div>	
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">DESCRIPCIÓN</a></li>
				<li><a href="#tabs-2">FOTOS</a></li>
				<li><a href="#tabs-3">COMENTARIOS</a></li>
			</ul>
			<div id="tabs-1">
				<p> <?php echo $flor["description"]; ?>	 </p>
			</div>
			<div id="tabs-2">
			<div class="row">
					<h3>IMAGENES</h3>
				<div id="aniimated-thumbnials"> 
					<?php foreach ($images as $image) : ?>							  											
								<a  data-lightbox="image-1" data-title="My caption" class="item" href="admin/uploads/products/<?php echo $image['file_name'];?>">
									<img class="img_product" src="admin/uploads/products/<?php echo $image['file_name'];?>">													
								</a>						
					<?php endforeach; ?>
				</div>
			</div>				
			</div>
			<div id="tabs-3">
				<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
				<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
			</div>
		</div>
</div>

<script>
  $( function() {
    $( "#tabs" ).tabs();

		lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
  } );

  </script>

<?php include_once 'includes/templates/footer.php';?>
