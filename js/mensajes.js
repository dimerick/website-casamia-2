$('document').ready(function(){
$(".user").mouseenter(function(){
var elemento = $(this);
var posicion = elemento.position();
var mensaje = elemento.attr( "mensaje" );
var top = posicion.top;
var left = posicion.left;
top -= 340;
left -= 250;
$("#menuser").html(mensaje);
$("#comenUs").css("margin-top",top);
$("#comenUs").css("margin-left",left);
$("#comenUs").css("visibility","visible");
});
$(".user").mouseleave(function(){
$("#comenUs").css("visibility","hidden");
});
});