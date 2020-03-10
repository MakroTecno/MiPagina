// CLONAR Y ELIMINAR INPUT

	$(document).ready(function(e){
	// VARIABLES 
	var html = 
	'<br><div class="form-group"><input type="text" name="codigo[]" placeholder="Codigo"></div><div class="form-group"><input type="text" name="descripcion[]" placeholder="Descripcion"></div><div class="form-group"><input type="number" name="vunitario[]" placeholder="Vunitario"></div><div class="form-group"><input type="text" name="unid_med[]" placeholder="Unidad/Medida"></div>';
	// CLONAR
	$("#agregar").click(function(){
		$(".product").append(html);
	});
	// ELIMINAR
	$(".array").on('click','#exit',function(){
		$(this).parent('div').remove();
	});
});

		// PETICION TIPO AJAX

	jQuery(document).on('submit','.product',function(event){
		event.preventDefault();
		jQuery.ajax({
			url: 'validarprodu.php',
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
		})
		.done(function(respuesta){
			console.log(respuesta);
			if(!respuesta.error) {
				alert("Los datos se ingresaron correctamente");
			}else {
				alert("Los datos NO se ingresaron correctamente");
			}
		})
		.fail(function(resp){
			console.log(resp.responseText);
		})
		.always(function(){
			console.log("complete");
		})
	});
