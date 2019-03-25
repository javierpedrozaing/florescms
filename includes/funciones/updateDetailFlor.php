<?php include_once '../../admin/includes/load.php'; ?>

<?php
$sql_img = "";
$flor_id = $_POST['flor_id'];
$item = $_POST['item']; 
$price_product = $_POST['price_product'];    

//$price_selected_empaque = isset($_SESSION['price_selected_empaque']) ? $_SESSION['price_selected_empaque'] : $_POST['price_selected_empaque'];
//$price_selected_tamano = isset($_SESSION['price_selected_tamano']) ? $_SESSION['price_selected_tamano'] : $_POST['price_selected_tamano'];

$select_id = 0;
$final_price = 0;
$image_update = "";
if ($_POST['item'] == "empaque") {    
    $_SESSION['price_selected_tamano'] = 0;
    $_SESSION['price_selected_empaque'] =  (isset($_POST['price_selected_empaque'])) ? $_POST['price_selected_empaque'] : 0;
    
    $select_id = $_POST['empaque_id'];     
    $select_id = remove_junk($db->escape($select_id));
    $sql_img = "SELECT img.file_name from flores fl
    INNER JOIN flores_has_imagen fm on fl.id = fm.flores_id
    INNER JOIN imagen img on fm.imagen_id = img.id
    WHERE fl.id = $flor_id and img.empaques_id = $select_id";   
}

if ($_POST['item'] == "tamano") {       
    $_SESSION['price_selected_tamano'] = (isset($_POST['price_selected_tamano'])) ? $_POST['price_selected_tamano'] : 0;  
    $select_id = $_POST['tamano_id'];     
    $select_id = remove_junk($db->escape($select_id));
    $sql_img = "SELECT img.file_name from flores fl
    INNER JOIN flores_has_imagen fm on fl.id = fm.flores_id
    INNER JOIN imagen img on fm.imagen_id = img.id
    WHERE fl.id = $flor_id and img.tamano_id = $select_id";
 
}


if ($item == "tamano" || $item == "empaque") {
    
    $imagen = find_by_sql($sql_img);
    
    if (intval($_SESSION['price_selected_empaque']) ==  0 and $_SESSION['price_selected_tamano'] == 0) { 
        
        $final_price = 0;
    }else{
        $final_price = intval($_SESSION['price_selected_tamano']) + intval($_SESSION['price_selected_empaque']) + intval($price_product);        

    }

    if (isset($imagen) and !empty($imagen)) {
        $image_update = $imagen[0]["file_name"];
    }

    $response = array("imagen" => $image_update, "precio_final" => $final_price, "tamano" => $select_id );

    
echo json_encode($response);
}



?>