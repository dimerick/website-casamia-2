$('document').ready(function(){
$.ajax({
url:   '../php/postRecientes.php',
type:  'post',
success:  function (respuesta){
post = "";
var obj = jQuery.parseJSON(respuesta);
$.each(obj, function( index, value ) {
post += "<li class=\"span12\"><div class=\"thumbnail\"><img src=\""+ value.urlImg +"\" style=\"width:100%;\"><i class=\"icon-calendar\"> "+ value.fecha +"</i><h4>"+ value.titulo+"</h4><p><a href=\""+ value.urlArt + "\" class=\"btn btn-primary\">Ver Mas</a></p></div></li>";
});
$("#postRecent").html(post);
}
});

});