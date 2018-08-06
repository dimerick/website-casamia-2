$('document').ready(function(){
$.ajax({
url:   'php/postCarousel.php',
type:  'post',
success:  function (respuesta){
post = "";
var obj = jQuery.parseJSON(respuesta);
num = 0;
$.each(obj, function( index, value ) {
if (num == 0){
post += "<div class=\"active item\"><a href=\""+ value.urlArt +"\"><img src=\""+ value.urlImg +"\"><div class=\"carousel-caption\"><h4>"+ value.titulo +"</h4><p>"+ value.descripcion +"</p></div></a></div>";
num++;
}else{
post += "<div class=\"item\"><a href=\""+ value.urlArt +"\"><img src=\""+ value.urlImg +"\"><div class=\"carousel-caption\"><h4>"+ value.titulo +"</h4><p>"+ value.descripcion +"</p></div></a></div>";
}
});
$("#postRecientes").html(post);
}
});

});