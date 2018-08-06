$('document').ready(function(){
$.ajax({
url:   'agregarAutores.php',
type:  'post',
success:  function (respuesta){
var obj = jQuery.parseJSON(respuesta);
var options = "<option selected></option>";
$.each(obj, function( index, value ) {
options += "<option value=\"" + value.id + "\">" + value.nombre +"</option>";
 // alert(options);
$("#autor").html(options);
});
}
});
});
