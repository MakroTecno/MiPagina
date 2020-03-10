// CLONAR Y ELIMINAR INPUT

	$(document).ready(function(e){
	// VARIABLES 
	var html = '<center><div><label for="numfact2">Confirmar No. de Factura</label><br><input type="number" id="numfact2" name="numfact2[]"><br><label for="code">Codigo</label><br><input id="code" type="number" name="codigo[]"><br><label for="cantidad">Cantidad</label><br><input type="number" id="cantidad" name="cantidad[]"><br> <hr><button id="exit">X</button></div></center>';
	// CLONAR
	$("#agregar").click(function(){
		$(".repetido").append(html);
	});
	// ELIMINAR
	$(".repetido").on('click','#exit',function(){
		$(this).parent('div').remove();
	});
});



			// PETICION TIPO AJAX

	jQuery(document).on('submit','.factura',function(event){
		event.preventDefault();
		jQuery.ajax({
			url: 'validarfactu.php',
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