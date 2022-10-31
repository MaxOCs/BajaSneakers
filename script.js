/*
$(document).ready(function(){
    $("#Registrar").submit(function() {
        $("input[type=email]").attr("pattern","[a-z0-9._%+-]+@[a-z0-9.-]+\\.\\--[a-z]{2,4}$");
        $("input[type=password]").attr("pattern","@\\[0-9]+");
        $("input[type=text]").attr("pattern","^[\\p{L} \\.'\\-]+$");
    });
});
*/
const $btnSignIn= document.querySelector('.sign-in-btn'),
      $btnSignUp = document.querySelector('.sign-up-btn'),  
      $signUp = document.querySelector('.sign-up'),
      $signIn  = document.querySelector('.sign-in');

document.addEventListener('click', e => {
    if (e.target === $btnSignIn || e.target === $btnSignUp) {
        $signIn.classList.toggle('active');
        $signUp.classList.toggle('active')
    }
});
$(document).ready(function(){

    $("#Flogin").validate({

        rules:{

             nombre:"required",
             apellido:"required",

             correo:{
                required:true,
                email:true
                //pattern:true
                pattern:"[Aa-Zz0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                
            },
            
            contra:{
                required:true,
                minlength: 6
            }
        },
        // mensajes de validación
        messages:{
            nombre:"Porfavor introducir un nombre valido, solo letras",
            apellido:"Porfavor introducir un apellido valido, solo letras",
            contra:{
                required:"Porfavor introducir una contraseña: debe tener minimo una mayuscula, minuscula, numero y simbolo",
                minlength:"La contraseña debe tener minimo 6 caracteres"
            },
            correo:{
                required:"Introduzca un correo",
                
            }
        },
        submitHandler:function(form){
            form.submit();
        }
    });
});