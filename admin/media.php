<?php
ob_start();
$page_title = 'Imagenes';
require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(2);
  
$empaques = find_all("SELECT * FROM empaques");
$tamanos = find_by_sql("SELECT * FROM tamano");
$colores = find_by_sql("SELECT * FROM colores");

?>
<?php $media_files = find_all('imagen');?>
<?php
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $photo->upload($_FILES['file_upload']);
  $color = $_POST['color'];
  $tamano = $_POST['tamano'];
    if($photo->process_media($color, $tamano)){
        $session->msg('s','Imagen actualizada exitosamente');
        redirect('media.php');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('media.php');
    }

  }

?>
<?php include_once('layouts/header.php'); ?>
     <div class="row">
        <div class="col-md-6">
          <?php echo display_msg($msg); ?>
        </div>

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <span class="glyphicon glyphicon-camera"></span>
            <span>Imágenes</span>
            <div class="pull-right">
              <form class="form-inline" action="media.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
              <div class="input-group">
              <label for="">Seleccione un tamaño:</label>
                <select name="tamano" id="">                  
                  <?php foreach ($tamanos as $tamano) : ?>                     
                      <option value="<?php echo $tamano["id"]; ?>"><?php echo $tamano["nombre"]; ?></option>                    
                  <?php endforeach; ?>
                </select>                 
              </div>
              <div class="input-group">
                <label for="">Selecciona un color:</label>
                <select name="color" id="">                  
                    <?php foreach($colores as $color) { ?>	                    
                      <option value="<?php echo $color["id"]; ?>"><?php echo $color["color"]; ?></option>                    
                    <?php }  ?>                  
                </select>
              </div>

              
                <div class="input-group">
                  <span class="input-group-btn">
                    <input type="file" name="file_upload" multiple="multiple" class="btn btn-primary btn-file"/>
                 </span>

                 <button type="submit" name="submit" class="btn btn-default">Upload</button>
               </div>
              </div>
             </form>
            </div>
          </div>
          <div class="panel-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Tamaño</th>
                  <th class="text-center">Color</th>
                  <th class="text-center" style="width: 20%;">Tipo</th>
                  <th class="text-center" style="width: 50px;">Acciones</th>
                </tr>
              </thead>
                <tbody>
                <?php foreach ($media_files as $media_file): ?>
                <tr class="list-inline">
                 <td class="text-center"><?php echo count_id();?></td>
                  <td class="text-center">
                      <img src="uploads/products/<?php echo $media_file['file_name'];?>" class="img-thumbnail" />
                  </td>
                <td class="text-center">
                  <?php echo $media_file['tamano_id'];?>
                </td>
                <td class="text-center">
                  <?php echo $media_file['colores_id'];?>
                </td>
                <td class="text-center">
                  <?php echo $media_file['file_name'];?>
                </td>
                <td class="text-center">
                  <?php echo $media_file['file_type'];?>
                </td>
                <td class="text-center">
                  <a href="delete_media.php?id=<?php echo (int) $media_file['id'];?>" class="btn btn-danger btn-xs"  title="Edit">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </td>
               </tr>
              <?php endforeach;?>
            </tbody>
          </div>
        </div>
      </div>
</div>


<?php include_once('layouts/footer.php'); ?>
