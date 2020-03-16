// CLONAR Y ELIMINAR INPUT
	    $(document).ready(function(){
        var i = 1;

        $('#agregar').click(function () {
            i++;
            $('.repetido').append('<div class="repetido'+i+'">' +
            						'<center><label for="code">Code Producto</label>' +
									'<br><input id="code" type="number" name="codigo[]">' +
									'<br><label for="cantidad">Cantidad</label>'+
									'<br><input type="number" id="cantidad" name="cantidad[]"><br><br>'+
                                    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button><br></center>'+
                                  '</div>');
        });
        
        $(document).on('click', '.btn_remove', function () {
            var id = $(this).attr('id');
           $('.repetido'+ id).remove();
        });

        $('.submit').click(function(){
            $.ajax({
                url:"validarfactu.php",
                method:"POST",
                data:$('#facturas').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#facturas')[0].reset();
                }
            });
        });
    })