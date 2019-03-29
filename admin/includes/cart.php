<?php

/*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
   function get_products(){
    global $db;
    $sql  =" SELECT DISTINCT f.id, f.activo, f.nombre,f.cantidad,f.precio, ip.file_name as 'image', c.nombre";
    $sql  .=" AS categoria";
    $sql  .=" FROM flores f";
    //$sql  .=" INNER JOIN flores_has_imagen fm on f.id = fm.flores_id";
    //$sql  .=" INNER JOIN imagen img on fm.imagen_id = img.id";
    $sql  .=" LEFT JOIN imagenprincipal ip ON ip.id = f.imagenprincipal_id";
    $sql  .=" LEFT JOIN categorias c ON c.id = f.categorias_id";   
    $sql  .=" WHERE f.activo = 1";
    $sql  .=" GROUP BY f.id";    
    $sql  .=" ORDER BY f.id ASC";
   return find_by_sql($sql);

  }
?>