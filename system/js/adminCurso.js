$('document').ready(function(){

/*
$("button.removeUser").on("click", function(){
alert("vas a eliminar este elemento");
});
*/

$("#selectSession").change(function(){
var idCurso = $("#cursos").val();
var session = $(this).val();
var parametros = {
"idSession" : session,
"idCurso" : idCurso
};
$.ajax({
data: parametros,
url:   'php/consultarSesion.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
var obj = jQuery.parseJSON(respuesta);
var filas = "";
var options = "";
var numSession = obj.numSession;
for(var i=1;i<=numSession;i++){
if(i==session){
options += "<option value=\"" + i + "\" selected>" + i +"</option>";
}else{
options += "<option value=\"" + i + "\">" + i +"</option>";
}

}
$("#selectSession").html(options);
$("#numSession").text($("#selectSession").val());
$("#fechaSession").text(obj.fecha);
var estudents = obj.estudiantes;
var filas = "";
$.each(estudents, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ value.nombre +"</td></tr>";
});
$( "#estudentSession").html(filas);
$("#estado").val("");
}
});
});

//Eliminar usuario
$('body').on("click", 'button.removeUser', function(){
var idUser = $(this).prop("value");
var idCurso = $("#cursos").val();
var parametros = {
"idUser" : idUser,
"idCurso" : idCurso
};

$.ajax({
data: parametros,
url:   'php/consultarNomEstudent.php',
type:  'post',
beforeSend: function(){
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
var nomEstudent = respuesta;
var confir = confirm("Realmente deseas retirar del curso a: \n" + nomEstudent);
if(confir){

$.ajax({
data: parametros,
url:   'php/retirarEstudiante.php',
type:  'post',
beforeSend: function () {
},
success:  function (respuesta) {
$("#estado").val("");
}
});

$("#estMatriculados").html("<tr><th colspan=\"3\"> Estudiantes Matriculados</th></tr>");
$("#estDesertores").html("<tr><th colspan=\"2\"> Estudiantes Retirados</th></tr>");

$.ajax({
data:  parametros,
url:   'php/estudiantesMatriculados.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
$("#estado").val("");
var filas = "";
var obj = jQuery.parseJSON(respuesta);
var options = "<option selected></option>";
$.each(obj, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ "<a href=\"php/datUser.php?id="+ value.id + "\">" + value.nombre + "</a>"+"</td>\
<td>"+ value.asistencia +"<td>"+ value.faltas +"</td><td>"+ value.porcenPart +"</td>\
<td><button class=\"removeUser\" value=\""+ value.id + "\"" + "><i class=\"icon-remove\">X</i></button></td></tr>";
//alert(filas);
});
$( "#estMatriculados").append(filas);
}
});

$.ajax({
data:  parametros,
url:   'php/estudiantesRetirados.php',
type:  'post',
beforeSend: function(){
},
success:  function (respuesta) {
var filas = "";
var obj = jQuery.parseJSON(respuesta);
var options = "<option selected></option>";
$.each(obj, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ value.nombre +"</td></tr>";
});
$( "#estDesertores").append(filas);
}
});
}
$("#estado").val("");
}
});

});
//Eliminar usuario


//agrego los cursos al select
$.ajax({
url:   'php/consultarCurso.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
var obj = jQuery.parseJSON(respuesta);
var options = "<option selected></option>";
$.each(obj, function( index, value ) {
options += "<option value=\"" + value.id + "\">" + value.nomCurso +"</option>";
 // alert(options);
$("#cursos").html(options);
});
$("#estado").val("");
}
});
//agrego los cursos al select

$("#matricularEst").click(function(){
if($("#cursos").val() != ""){
if($("#usuariosCM").val() != ""){
//alert("Id estudiante: " + $("#usuariosCM").val());
//alert("Id curso: " + $("#cursos").val());
$.ajax({
data:  {"usuario":$("#usuariosCM").val(),"idCurso":$("#cursos").val()},
url:   'php/matricularEstudiante.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
$("#usuariosCM").val("");
$("#estMatriculados").html("<tr><th colspan=\"3\"> Estudiantes Matriculados</th></tr>");
alert(respuesta);
var valor = $("#cursos").val();
var parametros = {
"idCurso" : valor
};

$.ajax({
data:  parametros,
url:   'php/estudiantesMatriculados.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta){
$("#estado").val("");
var filas = "";
var obj = jQuery.parseJSON(respuesta);
var options = "<option selected></option>";
$.each(obj, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ "<a href=\"php/datUser.php?id="+ value.id + "\">" + value.nombre + "</a>"+"</td>\
<td>"+ value.asistencia +"<td>"+ value.faltas +"</td><td>"+ value.porcenPart +"</td>\
<td><button class=\"removeUser\" value=\""+ value.id + "\"" + "><i class=\"icon-remove\"></i></button></td></tr>";
});
$( "#estMatriculados").append(filas);
}
});
}
});
}else{
alert("Debes seleccionar el estudiante a matricular");
}

}else{
alert("Debes seleccionar un curso");
}

});

$("#cursos").change(function(){

$.ajax({
data:  {"idCurso":$("#cursos").val()},
url:   'php/consultarInfoCurso.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta){
$("#estado").val("");
var obj = jQuery.parseJSON(respuesta);
$("#nomDocente").html(obj.docente);
$("#fechaInicio").html(obj.fechaInicio);
$("#numSessions").html(obj.numSessions);
}
});

$("#estMatriculados").html("<tr><th colspan=\"3\"> Estudiantes Matriculados</th></tr>");
$("#estDesertores").html("<tr><th colspan=\"2\"> Estudiantes Retirados</th></tr>");
//consulto estudiantes matriculados y los agrego a la pagina
var valor = $(this).val();
var parametros = {
"idCurso" : valor
};

$.ajax({
data:  parametros,
url:   'php/estudiantesMatriculados.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta){
$("#estado").val("");
var filas = "";
var obj = jQuery.parseJSON(respuesta);
var options = "<option selected></option>";
$.each(obj, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ "<a href=\"php/datUser.php?id="+ value.id + "\">" + value.nombre + "</a>"+"</td>\
<td>"+ value.asistencia +"<td>"+ value.faltas +"</td><td>"+ value.porcenPart +"</td>\
<td><button class=\"removeUser\" value=\""+ value.id + "\"" + "><i class=\"icon-remove\"></i></button></td></tr>";
});
$( "#estMatriculados").append(filas);
}
});

$.ajax({
url:   'php/consultarUsuarios.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success: function(respuesta){
var options = "<option selected></option>";
var obj = jQuery.parseJSON(respuesta);
$.each(obj, function( index, value ){
options += "<option value=\"" + value.id + "\">" + value.nombre +"</option>";
});
$( "#usuariosCM").html(options);
}
});


$.ajax({
data:  parametros,
url:   'php/estudiantesRetirados.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
$("#estado").val("");
var filas = "";
var obj = jQuery.parseJSON(respuesta);
var options = "<option selected></option>";
$.each(obj, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ value.nombre +"</td></tr>";
});
$( "#estDesertores").append(filas);
}
});

$.ajax({
data: parametros,
url:   'php/consultarSesion1.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
var obj = jQuery.parseJSON(respuesta);
var filas = "";
var options = "";
var numSession = obj.numSession;
for(var i=1;i<=numSession;i++){
if(i==1){
options += "<option value=\"" + i + "\" selected>" + i +"</option>";
}else{
options += "<option value=\"" + i + "\">" + i +"</option>";
}

}
$("#selectSession").html(options);
$("#numSession").text("1");
$("#fechaSession").text(obj.fecha);
var estudents = obj.estudiantes;
$.each(estudents, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ value.nombre +"</td></tr>";
});
$( "#estudentSession").html(filas);
}
});

$.ajax({
data: parametros,
url:   'php/consultarSesion1.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
var obj = jQuery.parseJSON(respuesta);
var filas = "";
var options = "";
var numSession = obj.numSession;
for(var i=1;i<=numSession;i++){
if(i==1){
options += "<option value=\"" + i + "\" selected>" + i +"</option>";
}else{
options += "<option value=\"" + i + "\">" + i +"</option>";
}

}
$("#selectSession").html(options);
$("#numSession").text("1");
$("#fechaSession").text(obj.fecha);
var estudents = obj.estudiantes;
$.each(estudents, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ value.nombre +"</td></tr>";
});
$( "#estudentSession").html(filas);
}
});
});
//consulto estudiantes matriculados

//seleccionar o deseleccionar todos los estudiantes matriculados
$("#selEst").change(function(){
if ($(this).is(':checked')) {
        $("#estMatriculados input[type=checkbox]").prop('checked', true);
    } else {
        $("#estMatriculados input[type=checkbox]").prop('checked', false);
    }
});
//seleccionar o deseleccionar todos los estudiantes matriculados

$("#createSession").click(function(){
var date = $( "#diaSession").val();
if(date != ""){
var session = "{\"fecha\"" + ":" + "\"" + date + "\"" + ", \"estudiantes\"" + "\:" + "[";
var numSelected = 0;
$("#estMatriculados input[type=checkbox]").each(function(){
if($(this).prop('checked')){
var id = $(this).prop('value');
numSelected++;
session += "{\"id\""+":"+"\""+id+"\"},";
}
});
if(numSelected == 0){
session += ",";
}
var size = session.length;
var clase = session.substring(0, size-1);
clase += "]}";
$("#estado").val("");
var curso = $("#cursos").val();
var parametros = {
"idCurso" : curso,
"session" : clase
};
$.ajax({
data: parametros,
url:   'php/registrarSession.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
$("#estado").val("");
alert(respuesta);
$("#selEst").prop("checked", false);
$("#diaSession").val("");
}
});

var numOption = $("#selectSession option").length
var session = numOption+1;
var idCurso = $("#cursos").val();

$.ajax({
data:  parametros,
url:   'php/estudiantesMatriculados.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta){
var filas = "<tr><th colspan=\"6\"> Estudiantes Matriculados</th></tr>";
var obj = jQuery.parseJSON(respuesta);
$.each(obj, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ "<a href=\"php/datUser.php?id="+ value.id + "\">" + value.nombre + "</a>"+"</td>\
<td>"+ value.asistencia +"<td>"+ value.faltas +"</td><td>"+ value.porcenPart +"</td>\
<td><button class=\"removeUser\" value=\""+ value.id + "\"" + "><i class=\"icon-remove\"></i></button></td></tr>";
});
$( "#estMatriculados").html(filas);
}
});

var parametros = {
"idSession" : session,
"idCurso" : idCurso
};

$.ajax({
data:  {"idCurso":$("#cursos").val()},
url:   'php/consultarInfoCurso.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta){
$("#estado").val("");
var obj = jQuery.parseJSON(respuesta);
$("#nomDocente").html(obj.docente);
$("#fechaInicio").html(obj.fechaInicio);
$("#numSessions").html(obj.numSessions);
}
});

$.ajax({
data: parametros,
url:   'php/consultarSesion.php',
type:  'post',
beforeSend: function () {
$("#estado").val("Procesando, espere por favor...");
},
success:  function (respuesta) {
var obj = jQuery.parseJSON(respuesta);
var filas = "";
var options = "";
var numSession = obj.numSession;
for(var i=1;i<=numSession;i++){
if(i==session){
options += "<option value=\"" + i + "\" selected>" + i +"</option>";
}else{
options += "<option value=\"" + i + "\">" + i +"</option>";
}
}
$("#selectSession").html(options);
$("#numSession").text($("#selectSession").val());
$("#fechaSession").text(obj.fecha);
var estudents = obj.estudiantes;
filas = "";
$.each(estudents, function( index, value ) {
filas += "<tr><td><input type=\"checkbox\" value=\"" + value.id +"\"></td><td>"+ value.nombre +"</td></tr>";
});
$( "#estudentSession").html(filas);
}
});
}else{
alert("Ingrese la fecha de la clase");
$( "#diaSession").focus();
}
});
});
