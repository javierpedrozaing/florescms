<?php require  'includes/templates/header.php';?>
<div class="seccion"></div>
<?php include_once 'includes/funciones/connect_db.php';?>


<?php ob_start();
 ?>
<?php 

$flor_id = $_GET['flor_id']; 
?>

<?php 
$sql = "SELECT f.nombre as 'nombre', cat.nombre as 'categoria', f.precio as 'precio', img.file_name as 'imagen' FROM flores f
 INNER JOIN imagen img ON f.imagen_id = img.id
 INNER JOIN categorias cat ON f.categorias_id = cat.id
 WHERE f.id = $flor_id";

$getFlores = $mysqli->query($sql);	
$flor = mysqli_fetch_assoc($getFlores);


$sqlempaques = "SELECT * FROM empaques";
$empaques = $mysqli->query($sqlempaques);
$sqltamanos = "SELECT * FROM tamaño";
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
				<select name="" id="">
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
				<select name="" id="">
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
</div>

<?php include_once 'includes/templates/footer.php';?>
