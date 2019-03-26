$(function(){

    //SCROLL PANTALLA MENU//
    /*var windowHeight = $(window).height();
    var barraAltura= $('.barra').innerHeight();
    console.log(barraAltura);

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight){
            $('.barra').addClass('fixed');
            $('.body').css({'margin-top':barraAltura+'px'});
        }else{
            $('.barra').removeClass('fixed');
            $('.body').css({'margin-top':0px'});
            
        }
    });*///FINAL PANTALLA FLOTANTE//

    //MENU RESPONSIVE//
 
    $('.menu-movil').on('click', function(){
        $('.navegacion-principal').slideToggle();
    });
    //FINAL MENU RESPONSIVE//


$(".demo-picked span").on("DOMSubtreeModified",function(){
    console.log( $(this).text());
     var parametros = {
                "fecha" : $(this).text(),                
        };
     $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'includes/funciones/getAgenda.php', //archivo que recibe la peticion
                type:  'post', //método de envio
               
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    console.log("respuesta "+ response);
                        $("#resultado").html(response);
                }
    });
});



$(".detail.container #empaque").on("change", function(){
    
    var selected_empaque = $(this).find('option:selected');
    var flor_id = $('.detail.container .flor_id').text();
    const precio_producto = $(".detail.container .price_product").text();
    var parametros = {
        "item" : "empaque",
        "flor_id" : flor_id,
        "empaque_id": selected_empaque.val(),
        "price_selected_empaque" : selected_empaque.data('price'),                
        "price_product" : precio_producto,  
    };
    console.log(parametros);
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'includes/funciones/updateDetailFlor.php', //archivo que recibe la peticion
        dataType: 'JSON',
        type:  'post', //método de envio                            
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve                            
            console.log(response.imagen);                                  
            var precio_final = response.precio_final;
            var image_update = response.imagen;
            console.log(precio_final);
           if (precio_final == 0) {
            $(".detail.container .price span").html(precio_producto);               
           }else{
            $(".detail.container .price span").html(precio_final);   
           }

           if (image_update != "") {
            $(".detail.container .image").html("<img src='admin/uploads/products/"+ image_update + "' >");
           }

           $(".detail.container .tamanos").show();
        }
    });

});


$(".detail.container #tamano").on("change", function(){
    
    var selected_tamano = $(this).find('option:selected');
    var flor_id = $('.detail.container .flor_id').text();
    const precio_producto = $(".detail.container .price_product").text();
    var parametros = {
        "item" : "tamano",
        "flor_id" : flor_id,
        "tamano_id": selected_tamano.val(),
        "price_selected_tamano" : selected_tamano.data('price'),                
        "price_product" : precio_producto,  
    };    
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'includes/funciones/updateDetailFlor.php', //archivo que recibe la peticion
        dataType: 'JSON',
        type:  'post', //método de envio 
                               
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve                            
            console.log(response.imagen);                                  
            var precio_final = response.precio_final;
            var image_update = response.imagen;
            console.log(precio_final);
           if (precio_final == 0) {
            $(".detail.container .price span").html(precio_producto);               
           }else{
            $(".detail.container .price span").html(precio_final);   
           }

           if (image_update != "") {
            $(".detail.container .image").html("<img src='admin/uploads/products/"+ image_update + "' >");
           }
            
            
        },
        error: function(){
            console.log("error en la consulta");
        }
    });
    
});


// function add to cart

$(".detail.container .add_cart").on("click", function(){
    var action = "add";
    var flor_id = $('.detail.container .flor_id').text();

});


$(".content-addcart a").on("click", function(e){
    e.preventDefault();
    $flor_id = $(".detail.container .id_product").text();
    $precio_flor = $(".detail.container .price span").text();

    console.log("id product: " + $flor_id);
    console.log("precio product: " + $precio_flor);

    window.location.replace("add_cart.php?action=add&flor_id="+ $flor_id + "&precio_flor="+ $precio_flor +" ");
    

});

});