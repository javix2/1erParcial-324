const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll(#formulario);

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/,
    nombre: /^[a-zA-ZA-y\s]{1, 40}$/,
    password: /^{4,12}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/
}