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

$(".detail.container .add_cart").on("click", function(e){
    e.preventDefault();
});

$(".detail.container #empaque").on("change", function(){
    var selected = $(this).find('option:selected');
    var precio_producto = $(".detail.contaier .price span").text();
    var parametros = {
        "item" : "empaque",
        "price_empaque" : selected.data('price'),                
        "price_product" : precio_producto,  
    };
    
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'includes/funciones/updateDetailFlor.php', //archivo que recibe la peticion
        type:  'post', //método de envio                            
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve                            
            console.log(response);
            $(".detail.container .image").html(response);
        }
    });

});


$(".detail.container #tamano").on("change", function(){
    
    var selected = $(this).find('option:selected');
    
    const precio_producto = $(".detail.container .price_product").text();
    var parametros = {
        "item" : "tamano",
        "tamano_id": selected.val(),
        "price_tamano" : selected.data('price'),                
        "price_product" : precio_producto,  
    };
    
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'includes/funciones/updateDetailFlor.php', //archivo que recibe la peticion
        dataType: 'JSON',
        type:  'post', //método de envio 
                             
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve                            
            
            console.log(parametros);
            var precio_final="";
            var len = response.length;            
            precio_final = response.precio_final;
            console.log(precio_final);
           if (precio_final ==null) {
            $(".detail.container .price span").html(precio_producto);               
           }else{
            $(".detail.container .price span").html(precio_final);   
           }
            
            $(".detail.container .image").html(response);
        },
        error: function(){
            console.log("error en la consulta");
        }
    });
    
});

});