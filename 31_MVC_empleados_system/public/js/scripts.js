// Scripts JS
$(document).ready(function(){
    // Validaciones básicas ejemplo
    $("#registerForm").on('submit', function(){
        let pass = $("#password").val();
        let confirm = $("#password_confirm").val();
        if(pass !== confirm){
            alert("Las contraseñas no coinciden.");
            return false;
        }
        return true;
    });
});
