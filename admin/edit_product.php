<?php ob_start();
  $page_title = 'Editar producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
//   page_require_level(2);
?>
<?php
$product = find_by_id('flores',(int)$_GET['id']);

$imagen = $db->query("SELECT * FROM flores_has_imagen where flores_id = 6");
$result_img = mysqli_fetch_assoc($imagen);

$agenda_product = get_agenda_product((int)$_GET['id']);

$anio = $agenda_product["anio"];
$month = $agenda_product["mes"];
$day = $agenda_product["dia"];

$agenda = "$anio-$month-$day";


$all_categories = find_all('categorias');
$all_photo = find_all('imagen');
if(!$product){
  $session->msg("d","Missing product id.");
  redirect('product.php');
}
?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-categorie','product-quantity','buying-price' );
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
       $p_buy   = remove_junk($db->escape($_POST['buying-price']));
       $agenda_selected = remove_junk($db->escape($_POST['agenda']));
       $p_activo   = remove_junk($db->escape($_POST['activo']));
       $p_description   = remove_junk($db->escape($_POST['description']));

       $date = date_create($agenda_selected);     
       $year = date_format($date, 'Y');
       $month = date_format($date, 'm');
       $day = date_format($date, 'd');
       if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
         $media_id = '0';
       } else {
        $media_id = $_POST['product-photo'];
       }

       // query update flores
       $query   = "UPDATE flores SET";
       $query  .=" nombre ='{$p_name}', cantidad ='{$p_qty}',";
       $query  .=" descripcion ='{$p_description}', activo ='{$p_activo}',";
       $query  .=" precio ='{$p_buy}', categorias_id ='{$p_cat}'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
       
               if($result){
                $flor_id = find_product_by_title($p_name); 
               
                // query update agenda
                $query_agenda = "UPDATE agenda SET ";
                $query_agenda  .=" anio ='{$year}', mes ='{$month}', dia ='{$day}', flores_id ='{$flor_id[0]['id']}'";
                $query_agenda  .=" WHERE flores_id ='{$product['id']}'";
                $result_query_agenda = $db->query($query_agenda);


                // query update images
                if ($media_id != 0) {
                  foreach ($media_id as $media) {
                  $clear_images = $db->query("DELETE FROM flores_has_imagen WHERE flores_id = {$flor_id[0]['id']}");   
                    $query_images = "INSERT IGNORE INTO flores_has_imagen (flores_id, imagen_id) VALUES ('{$flor_id[0]['id']}', '{$media}') ";                
                    $result_images = $db->query($query_images);
                  }
  
                }
               
                if($result_query_agenda){
                  $session->msg('s',"Producto actualizado ");
                  redirect('product.php', false);
                }else {
                  $session->msg('d',' fallo actualizando el producto');
                  redirect('edit_product.php?id='.$product['id'], false);
                }
                 
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_product.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_product.php?id='.$product['id'], false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar producto</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_product.php?id=<?php echo (int)$product['id'] ?>">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" value="<?php echo remove_junk($product['nombre']);?>">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                    <option value="">Seleccione la categoría</option>
                   <?php  foreach ($all_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id']; ?>" <?php if($product['categorias_id'] === $cat['id']): echo "selected"; endif; ?> >
                       <?php echo remove_junk($cat['nombre']); ?></option>
                   <?php endforeach; ?>
                 </select>
                 <div class="form-group" style="margin-top:20px;">                    
                      <label for="">mostrar producto?</label>
                      <input type="radio" name="activo"  <?php if($product["activo"] == 1): echo "checked";  endif; ?> value="1">Si
                      <input type="radio" name="activo"  <?php if($product["activo"] == 0): echo "checked";  endif; ?> value="0">No
                    </div>
                  </div>
                  <div class="col-md-6">                 
                    <select class="form-control" name="product-photo[]" multiple>
                      <option value="">No imagen</option>
                      <?php  foreach ($all_photo as $photo): ?>
                        <option value="<?php echo (int)$photo['id'];?>" <?php if($result_img["imagen_id"] === $photo['id']): echo "selected"; endif; ?> >
                          <?php echo $photo['file_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Cantidad disponible</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                       <i class="glyphicon glyphicon-shopping-cart"></i>
                      </span>
                      <input type="number" class="form-control" name="product-quantity" value="<?php echo remove_junk($product['cantidad']); ?>">
                   </div>
                  </div>
                 </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Fecha agenda</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                       <i class="glyphicon glyphicon-shopping-cart"></i>
                      </span>                      
                      <input type="date" class="form-control" name="agenda" value="<?php echo $agenda; ?>">
                   </div>
                  </div>
                 </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="qty">Precio</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="number" class="form-control" name="buying-price" value="<?php echo remove_junk($product['precio']);?>">
                     <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>
                 </div>    
                              
               </div>
              </div>
               <div class="form-group">
                  <label for="">Descripción</label><br/>
               <div class="row">                  
                 <div class="col-md-12">                    
                 <textarea name="description" id="" cols="50" rows="5" ><?php print trim($product['descripcion']);?> </textarea>
                 </div>
                </div>
               </div>
              <button type="submit" name="product" class="btn btn-danger">Actualizar</button>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
