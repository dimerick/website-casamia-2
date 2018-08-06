/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){  
  
    $("#checkEdad").click(function() {  
        if($("#checkEdad").is(':checked')) {  
            $("#busquedaEdad").css("display", "block");
            $("#edad1").attr("required", "");
            $("#edad2").attr("required", "");
        } else {  
            $("#busquedaEdad").css("display", "none");
            $("#edad1").removeAttr("required");
            $("#edad2").removeAttr("required");
        } 
    });  
    $("#checkGrupoP").click(function() {  
        if($("#checkGrupoP").is(':checked')) {  
            $("#busquedaGrupoP").css("display", "block");  
        } else {  
            $("#busquedaGrupoP").css("display", "none");
        }  
    });
    
    $("#checkGenero").click(function() {  
        if($("#checkGenero").is(':checked')) {  
            $("#busquedaGenero").css("display", "block");  
        } else {  
            $("#busquedaGenero").css("display", "none");
        } 
    });
    
    $("#checkEstrato").click(function() {  
        if($("#checkEstrato").is(':checked')) {  
            $("#busquedaEstrato").css("display", "block");  
        } else {  
            $("#busquedaEstrato").css("display", "none");
        } 
    });
    
    $("#checkBarrio").click(function() {  
        if($("#checkBarrio").is(':checked')) {  
            $("#busquedaBarrio").css("display", "block");
            $("#barrio").attr("required", "");
        } else {  
            $("#busquedaBarrio").css("display", "none");
            $("#barrio").removeAttr("required");
        } 
    });
    
    $("#checkComuna").click(function() {  
        if($("#checkComuna").is(':checked')) {  
            $("#busquedaComuna").css("display", "block");
            $("#comuna").attr("required", "");
        } else {  
            $("#busquedaComuna").css("display", "none");
            $("#comuna").removeAttr("required");
        } 
    });
    
  
}); 

