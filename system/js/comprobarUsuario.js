$('document').ready(function(){
 function comprobarDoc(text) {
 if(text.length > 6){
 for (var i = 0; i < text.length; i++) {
                    if (text[i] != " ") {
                        return true;
                    }
                }
                return false;
 }else{
 return false;
 } 
                
            }
$("#checkUser").click(function(){
var doc = $("#docUser").val();
if(comprobarDoc(doc)){
$.ajax({
data:  {"doc":doc},
url:   'php/comprobarUsuario.php',
type:  'post',
success:  function (respuesta) {
if(respuesta == 1){
alert("El usuario se encuentra registrado");
}
else if (respuesta == 0){
var url = "php/registroUsuarios.php?id=" + doc;
window.location.href = url;
}
}
});

}
else{
alert("El documento ingresado NO es valido");
}

});
});