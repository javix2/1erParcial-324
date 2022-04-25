function validare(){
    var nombre, apellidos, correo, usuario, clave, telefono, expresion;
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    correo = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("clave").value;
    telefono = document.getElementById("telefono").value;
    
    expresion = /\w+@\w+\.+[a-z]/;
    
    if(nombre === "" || apellidos === "" || correo === "" ||usuario === "" || clave === "" || telefono === ""){
        alert('todos los campos son obligatorios');
        return false;
    }
    else if(nombre.length>30) {
        alert("El Nombre es muy largo");
        return false;
    }
    else if(apellidos.length>80) {
        alert("Los apellidos son muy largos");
        return false;
    }
    else if(correo.length>100) {
        alert("El correo es muy largo");
        return false;
    }
    else if(!expresion.test(correo)){
        alert("el correo no es valido");
    }
    else if(usuario.length>20 || clave.length>20) {
        alert("El usuario y clave solo deben tener 20 caracteres");
        return false;
    }
    else if(telefono.length>10) {
        alert("El telefono es muy largo");
        return false;
    }
    else if(isNaN(telefono)) {
        alert("El telefono ingresado no es un numero");
        return false;
    }
}