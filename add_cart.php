
<?php require  'includes/templates/header.php';?>
<?php 

    if(isset($_POST['submit'])){ 
  
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
        
    }
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['flor_id']); 
        $precio_flor = intval($_GET['precio_flor']);
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $flor=find_by_id("flores", $id); 
            
            if(isset($flor)){                                   
                $_SESSION['cart'][$flor['id']]=array( 
                        "quantity" => 1, 
                        "price" => $precio_flor 
                    ); 
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
    $totalprice = 0;    
    
    
    $sql="SELECT * FROM flores WHERE id IN ("; 
                      
    foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.","; 
    } 
      
    $sql=substr($sql, 0, -1).") ORDER BY nombre ASC"; 
    $flores= find_by_sql($sql); 


    $array_products = [];
?>

<div class="container">
<div class="row">
    <div class="col-sm-8">	
        <h1>Productos seleccionados</h1> 
    </div>
    <div class="col-sm-4">	
    <a href="index.php" class="btn btn-default" style="right:0; top: 50px; position:relative;">Seguir comprando</a> 
    </div>

</div>
<p class="label label-danger">Para eliminar un producto ponga la cantidad en  0</p>
<form method="post" action="add_cart.php?page=cart"> 
    <table class="table table-bordered">           
        <tr> 
            <th>Nombre</th> 
            <th>Cantidad</th> 
            <th>Precio unidad</th>             
            <th>Precio total</th>    
        </tr>                   

            <?php foreach ($flores as $flor):
                $subtotal=$_SESSION['cart'][$flor['id']]['quantity']*$_SESSION['cart'][$flor['id']]['price']; 
                $totalprice+=$subtotal; 
                array_push($array_products, $flor['id']);
            ?>        
                    
                    <tr> 
                        
                        <td><?php echo $flor['nombre'] ?></td> 
                        <td><input type="number" max="<?php echo $flor["cantidad"] ?>" name="quantity[<?php echo $flor['id'] ?>]" size="1" value="<?php echo $_SESSION['cart'][$flor['id']]['quantity'] ?>" /></td> 
                        <td><?php echo "$" . $_SESSION['cart'][$flor['id']]['price'] ?></td> 
                        <td><?php echo "$" . $_SESSION['cart'][$flor['id']]['quantity']*$_SESSION['cart'][$flor['id']]['price'] ?></td> 
                    </tr> 
                    
            <?php endforeach; ?>  
            <tr> 

            
                        <td colspan="3"><button type="submit" class="btn btn-primary" name="submit">Actualizar carrito</button></td>
                        <td colspan="2">TOTAL: <?php echo "$" . $totalprice ?> </td> 
                    </tr> 
    </table> 
    <br /> 
    
</form> 

<?php
$path = "/flores/repository/florescms";
//$llave_encripcion = "138e8e67ceb"; //llave de encripción que se usa para generar la fima
$llave_encripcion = "1111111111111111"; //llave de encripción que se usa para generar la fima
$apikey = "4Vj8eK4rloUd272L48hsrarnUA";
//$usuarioId = "88351"; //código único del cliente
$usuarioId = "512321"; //código único del cliente
$merchantId = "508029"; //código único del cliente
$refVenta = "pago flores"; //referencia que debe ser única para cada transacción
$iva=0; //impuestos calculados de la transacción
$baseDevolucionIva=0; //el precio sin iva de los productos que tienen iva
$valor=$totalprice;

$moneda ="COP"; //la moneda con la que se realiza la compra
$prueba = "1"; //variable para poder utilizar tarjetas de crédito de prueba
//$telefono= $_POST['telefono'];
$descripcion = "Pago en linea flores"; //descripción de la transacción
$url_respuesta = "http://" . $_SERVER['HTTP_HOST']. $path ."/response_pay.php";
$url_confirmacion = "http://" . $_SERVER['HTTP_HOST']. $path ."/confirmacion.php"; 
$emailComprador= (isset($_POST['email'])) ? $_POST['email'] : "" ; //email al que llega confirmación del estado final de la transacción, forma de identificar al comprador
//$firma_cadena = "$llave_encripcion~$usuarioId~$refVenta~$valor~$moneda"; //concatenación para realizar la firma
$firma_cadena = "$apikey~$merchantId~$refVenta~$valor~$moneda"; //concatenación para realizar la firma

$firma = md5($firma_cadena); //creación de la firma con la cadena previamente hecha

?>

<form action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" class="checkout" method="POST">
    <table class="table table-bordered" style="display:none;">
        <input name="accountId" type="hidden" value="<?php echo $usuarioId?>">
        <input name="merchantId" type="hidden" value="<?php echo $merchantId?>">        
        <input hidden name="description"  value="pago online flores">        
        <input name="url_confirmacion" type="hidden" value="<?php echo $url_confirmacion ?>">
        <input name="referenceCode" type="hidden" value="<?php echo $refVenta ?>">
        <input hidden name="amount"  value="<?php echo $valor ?>">
        <input name="tax" type="hidden" value="<?php echo $iva ?>">
        <input name="currency"      type="hidden"  value="COP" >
        <input name="taxReturnBase" type="hidden" value="<?php echo $baseDevolucionIva ?>" >
        <input name="signature" type="hidden" value="<?php echo $firma?>">
        <input name="extra1" type="hidden" value="<?php echo $descripcion; ?>" >
        <input name="extra2" type="hidden" value="1245251214" >
        <input name="buyerEmail" type="hidden" value="email@flores.com">
        <input name="test" type="hidden" value="<?php echo $prueba?>">
        <input name="responseUrl" type="hidden" value="<?php echo $url_respuesta?>">
        <input name="confirmationUrl"    type="hidden"  value="<?php echo $url_confirmacion?>" >        
    </table>               
        <button type="submit" style="left:600px; position:relative;" class="btn btn-success btn-lg" name="submit">Realizar pago</button> 
    
</form> 
</div>
<br /> 
