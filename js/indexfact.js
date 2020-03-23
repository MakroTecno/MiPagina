// CLONAR Y ELIMINAR INPUT
	    $(document).ready(function(){
        var i = 1;
        $('#agregar').click(function () {
            i++;
            $('.repetido').append('<div class="repetido'+i+'">' +
                                    '<input type="text" name="factura[]" placeholder="No. de Rutina">' +
									'<center><input id="code" type="number" name="codigo[]" placeholder="Codigo">' +
									'<br><input type="number" id="cantidad" name="cantidad[]" placeholder="Cantidad"><br><br>'+
                                    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Eliminar</button><br></center><hr>'+
                                  '</div>');
        });
        
        $(document).on('click', '.btn_remove', function () {
            var id = $(this).attr('id');
           $('.repetido'+ id).remove();
        });
    })
////////////////////////////////////////////////
//Cuando el formulario con ID facturas se envíe...
$("#facturas").on("submit", function(e){
    //Evitamos que se envíe por defecto
    e.preventDefault();
    //Creamos un FormData con los datos del mismo formulario
    var formData = new FormData(document.getElementById("facturas"));

    //Llamamos a la función AJAX de jQuery
    $.ajax({
        //Definimos la URL del archivo al cual vamos a enviar los datos
        url: "validarfactu.php",
        //Definimos el tipo de método de envío
        type: "POST",
        //Definimos el tipo de datos que vamos a enviar y recibir
        dataType: "HTML",
        //Definimos la información que vamos a enviar
        data: formData,
        //Deshabilitamos el caché
        cache: false,
        //No especificamos el contentType
        contentType: false,
        //No permitimos que los datos pasen como un objeto
        processData: false
    }).done(function(echo){
        //Cuando recibamos respuesta, la mostramos
        mensaje.html(echo);
        mensaje.slideDown(500);
    });
});