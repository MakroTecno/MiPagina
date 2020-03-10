/*
//BUSCADOR PARA SELECT
        jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
    });
});*/

// DESAPARECER UN LOGIN O REGISTRO
		$(document).ready(function() {
			    $("#login").hide();
			});
	$(document).ready(function(){
		$("#login2").on( "click", function() {
			$('#login').show(); //muestro mediante id
			$('#registro').hide(); //oculto mediante id
		 });
		$("#registro2").on( "click", function() {
			$('#registro').show(); //muestro mediante id
			$('#login').hide(); //oculto mediante id
		 });
	});
	$(document).ready(function() {
	    $("#Productos").hide();
	});
	$(document).ready(function(){
		$("#Agregarproduct").on( "click", function() {
			$('#Productos').show();
			
		 });
	});













