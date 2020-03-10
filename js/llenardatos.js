  // RELLENAR CAMPOS DESDE UN SELECT
$(document).ready(function() {
$("#codigo").focus();
$("#codigo").keydown(function(e) {
var url="getdatos.php";
$.getJSON(url,{ _num1: $("#codigo").val() }, function(clientes){
$.each(clientes, function(i,cliente) {
$("#vunitario").val(cliente.vunitario);
$("#descrip").val(cliente.descripcion);

if(cliente.resultado == "0") {
  $("#resultado").css("color","red");
  $("#resultado").text("codigo no disponible");
} else {
  $("#resultado").css("color","green");
  $("#resultado").text("codigo disponible");
}
});
});
});
});