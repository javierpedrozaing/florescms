<?php include_once '../../admin/includes/load.php'; ?>

<?php
$item = $_POST['item']; 
$price_tamano = $_POST['price_tamano']; 
$price_product = $_POST['price_product'];

if ($item == "empaque") {
    
}

if ($item == "tamano") {
    $image_update = "";
    $tamano_id = $_POST['tamano_id'];     

    //$sql_img = "SELECT * from imagen where tamano_id = $tamano_id";
    //$imagen = find_by_sql($sql_img);

    if ($price_tamano==0) {
        $final_price = null;
    }else{
        $final_price = intval($price_tamano) + intval($price_product);
    }
    

    if (!empty($imagen)) {
        $image_update = $imagen["file_name"];
    }


}


$response = array("imagen" => "", "precio_final" => $final_price, "tamano" => $tamano_id );

echo json_encode($response);

?>