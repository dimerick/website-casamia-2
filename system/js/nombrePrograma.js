$('document').ready(function(){
var valor = $("#programa").val();
var parametros = {
"programa" : valor
};

$.ajax({
data:  parametros,
url:   'consultarNombreCurso.php',
type:  'post',
beforeSend: function () {
$("#nomCurso").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
$("#nomCurso").val(respuesta);
}
});

$("#programa").change(function(){
var valor = $(this).val();
var parametros = {
"programa" : valor
};

$.ajax({
data:  parametros,
url:   'consultarNombreCurso.php',
type:  'post',
beforeSend: function () {
$("#nomCurso").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
$("#nomCurso").val(respuesta);
}
});
});
});