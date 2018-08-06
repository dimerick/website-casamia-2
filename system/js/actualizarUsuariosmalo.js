/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 //Este string contiene una imagen de 1px*1px color blanco,
            //lo dividí en dos líneas debido al espacio disponible
            window.imagenVacia = 'data:image/gif;base64,R0lGODlhAQABAI' +
                    'AAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

            window.mostrarVistaPrevia = function mostrarVistaPrevia() {

                var Archivos,
                        Lector;

                //Para navegadores antiguos
                if (typeof FileReader !== "function") {
                    $('#infoNombre').text('[Vista previa no disponible]');
                    $('#infoTamaño').text('(su navegador no soporta vista previa!)');
                    return;
                }

                Archivos = $('#archivo')[0].files;
                if (Archivos.length > 0) {

                    Lector = new FileReader();
                    Lector.onloadend = function(e) {
                        var origen,
                                tipo;

                        //Envía la imagen a la pantalla
                        origen = e.target; //objeto FileReader

                        //Prepara la información sobre la imagen
                        tipo = window.obtenerTipoMIME(origen.result.substring(0, 30));

                        $('#infoNombre').text(Archivos[0].name + ' (Tipo: ' + tipo + ')');
                        $('#infoTamaño').text('Tamaño: ' + e.total + ' bytes');
                        //Si el tipo de archivo es válido lo muestra, 
                        //sino muestra un mensaje 
                        if (tipo !== 'image/jpeg' && tipo !== 'image/png' && tipo !== 'image/gif') {
                            $('#vistaPrevia').attr('src', window.imagenVacia);
                            alert('El formato de imagen no es válido: debe seleccionar una imagen JPG, PNG o GIF.');
                        } else {
                            $('#vistaPrevia').attr('src', origen.result);
                        }

                    };
                    Lector.onerror = function(e) {
                        console.log(e)
                    }
                    Lector.readAsDataURL(Archivos[0]);

                } else {
                    var objeto = $('#archivo');
                    objeto.replaceWith(objeto.val('').clone());
                    $('#vistaPrevia').attr('src', window.imagenVacia);
                    $('#infoNombre').text('[Seleccione una imagen]');
                    $('#infoTamaño').text('');
                }
                ;


            };



            //Lee el tipo MIME de la cabecera de la imagen
            window.obtenerTipoMIME = function obtenerTipoMIME(cabecera) {
                return cabecera.replace(/data:([^;]+).*/, '\$1');
            }

            $(document).ready(function() {

                //Cargamos la imagen "vacía" que actuará como Placeholder
                $('#vistaPrevia').attr('src', window.imagenVacia);

                //El input del archivo lo vigilamos con un "delegado"
                $('#botonera').on('change', '#archivo', function(e) {
                    window.mostrarVistaPrevia();
                });

                //El botón Cancelar lo vigilamos normalmente
                $('#cancelar').on('click', function(e) {
                    var objeto = $('#archivo');
                    objeto.replaceWith(objeto.val('').clone());

                    $('#vistaPrevia').attr('src', window.imagenVacia);
                    $('#infoNombre').text('[Seleccione una imagen]');
                    $('#infoTamaño').text('');
                });

            });


 function comprobarTexto(text) {
                for (var i = 0; i < text.length; i++) {
                    if (text[i] != " ") {
                        return true;
                    }
                }
                return false;
            }
            
            //recibe una cadena y convierte la primera letra de cada palabra en mayuscula
             function mayusPrimera(string){
             string.trim();
             string = string.toLowerCase();
             var palabras = string.split(" ");
             var cadena = "";
             var palabra;
             for(var i=0;i < palabras.length;i++){
             palabra = palabras[i].charAt(0).toUpperCase() + palabras[i].slice(1) +" ";
             cadena += palabra
             }
             cadena.trim();
             return cadena; 
             }
            
            //calcula la edad de la persona, en base a su fecha de nacimiento
             function calcularEdad(fechaNacimiento){
             var array_fecha = fechaNacimiento.split("-");
             
             var dia = array_fecha[2];
             var mes = array_fecha[1];
             var ano = array_fecha[0];
             
             // cogemos los valores actuales
             var fecha_hoy = new Date();
             var ahora_ano = fecha_hoy.getYear();
             var ahora_mes = fecha_hoy.getMonth();
             var ahora_dia = fecha_hoy.getDate();
             
             // realizamos el calculo
             var edad = (ahora_ano + 1900) - ano;
             if ( ahora_mes < (mes - 1))
             {
             edad--;
             }
             if (((mes - 1) == ahora_mes) && (ahora_dia < dia))
             {
             edad--;
             }
             if (edad > 1900)
             {
             edad -= 1900;
             }
             
             return edad;
             }
            
            //comprueba si los campos de texto del formulario de registros son validos
            function comprobarCampos(menorEdad) {
                var formulario = document.forms.registroUsuarios;
                var numElementos = formulario.elements.length;
                for (var i = 0; i < numElementos; i++)
                {
                    
                    if (formulario.elements[i].name == "acudiente") {
                        if (menorEdad != true) {
                            continue;
                        }
                        else {
                            
                            if (comprobarTexto(formulario.elements[i].value) == false) {
                                formulario.elements[i].focus();
                                alert("Debes Ingresar un acudiente, ya que eres menor de edad");
                                return false;

                            }

                        }
                    }
                    else if (formulario.elements[i].type == "text") {
                        var textoValido = comprobarTexto(formulario.elements[i].value);
                        if (!(textoValido)) {
                                formulario.elements[i].focus();
                                alert("Debes diligenciar el campo: " + formulario.elements[i].name);
                                return false;

                            }

                    }
                }
                return true;

            }

            //comprueba si el formulario es valido y autoriza el envio de este
            function comprobarFormulario() {
                var camposValidos;
                var edad;
                edad = calcularEdad(document.forms.registroUsuarios.fechaNacimiento.value);
                var menorEdad = false;
                if(edad < 18 ){
                    menorEdad = true;                    
                }
                camposValidos = comprobarCampos(menorEdad);
            if(camposValidos){
                var formulario = document.forms.registroUsuarios;
                var numElementos = formulario.elements.length;
                var cadena;
                for (var i = 0; i < numElementos; i++)
                {
                  if (formulario.elements[i].type == "text") {
                      
                      cadena =  mayusPrimera(formulario.elements[i].value);
                      formulario.elements[i].value = cadena;
                     
                      
                  }  
                    
                }
                return true;
            }
            else{
                return false;
                
            }
     
            }


/*  
             
             $(document).ready(function(){
             alert("hola");
             $('input[name=imagen]').change( function(){
             
             $("#imagenNueva").attr("src","file:///" + this.val);
             
             //document.src = 
             //onChange="document.imagenNueva.src='file:///' + this.value"
             
             alert($(this).val()); 
             }
             
             
             );});
             
             */
            
            /*
             * Sintaxix para el manejo de eventos en JQUERY
             * $('Selector').nombreEvento( function(event){
             //funcion que administra el evento.
             //this es el elemento que disparo el evento.
             }
             * 
             * 
             */