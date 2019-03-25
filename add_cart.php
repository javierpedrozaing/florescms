
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
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $flor=find_by_id("flores", $id); 
            
            if(isset($flor)){                                   
                $_SESSION['cart'][$flor['id']]=array( 
                        "quantity" => 1, 
                        "price" => $flor['precio'] 
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
?>

<div class="container">
<div class="row">
    <div class="col-sm-8">	
        <h1>Productos agregados al carrito</h1> 
    </div>
    <div class="col-sm-4">	
    <a href="index.php" class="btn btn-default" style="right:0; top: 50px; position:relative;">Seguir comprando</a> 
    </div>


</div>
<p class="label label-success">Para eliminar un producto ponga la cantidad en  0</p>
<form method="post" action="add_cart.php?page=cart"> 
    <table class="table table-bordered">           
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th>             
            <th>Precio total</th>    
        </tr>                   

            <?php foreach ($flores as $flor):
                $subtotal=$_SESSION['cart'][$flor['id']]['quantity']*$flor['precio']; 
                $totalprice+=$subtotal; 
            ?>        
                    <tr> 
                        <td><?php echo $flor['nombre'] ?></td> 
                        <td><input type="number" name="quantity[<?php echo $flor['id'] ?>]" size="1" value="<?php echo $_SESSION['cart'][$flor['id']]['quantity'] ?>" /></td> 
                        <td><?php echo "$" . $flor['precio'] ?></td> 
                        <td><?php echo "$" . $_SESSION['cart'][$flor['id']]['quantity']*$flor['precio'] ?></td> 
                    </tr> 
                    
            <?php endforeach; ?>  
            <tr> 
                        <td colspan="3"><button type="submit" class="btn btn-primary" name="submit">Actualizar carrito</button></td>
                        <td colspan="2">TOTAL: <?php echo "$" . $totalprice ?> </td> 
                    </tr> 
    </table> 
    <br /> 
    
</form> 

<form action="checkout" class="checkout">
    <div class="products">
        <?php foreach ($flores as $flor):    
        ?>        
            <p><input type="text" name="nombre_producto" value="<?php echo $flor['nombre'] ?>"></p> 
            <p><input type="number" name="quantity[<?php echo $flor['id'] ?>]" size="1" value="<?php echo $_SESSION['cart'][$flor['id']]['quantity'] ?>" /></p> 
            <p><input type="text" name="precio_total" value="<?php echo $totalprice ?>"> </p> 
                                       <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price'] ?>$</td> 
            <p>Total Price: <?php echo $totalprice ?></p> 
           
        <?php endforeach; ?>  

    </div>                
        <button type="submit" style="left:600px; position:relative;" class="btn btn-success" name="submit">Realizar pago</button> 
    
</form> 
</div>
<br /> 
