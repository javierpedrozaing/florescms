<?php
 require_once('load.php');
/*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
   function get_products(){
    global $db;
    $sql  =" SELECT f.id,f.nombre,f.cantidad,f.precio,f.imagen_id,c.nombre";
   $sql  .=" AS categoria,i.file_name AS image";
   $sql  .=" FROM flores f";
   $sql  .=" LEFT JOIN categorias c ON c.id = f.categorias_id";
   $sql  .=" LEFT JOIN imagen i ON i.id = f.imagen_id";
   $sql  .=" ORDER BY f.id ASC";
   return find_by_sql($sql);

  }
?>