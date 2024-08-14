function validarCorreo() {
    var correoInput = document.getElementById('usuario');
    var correo = correoInput.value.trim(); // Elimina espacios al inicio y al final

    var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexCorreo.test(correo)) {
        alert('Por favor, ingrese un correo electrónico válido.');
        correoInput.focus(); // Pone el foco en el campo de correo
        return false;
    }

    return true;
}

function validarContraseña() {
    var contraseñaInput = document.getElementById('contraseña');
    var contraseña = contraseñaInput.value;

    // La contraseña debe tener al menos 8 caracteres
    if (contraseña.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres.');
        contraseñaInput.focus(); // Pone el foco en el campo de contraseña
        return false;
    }

    // La contraseña debe contener al menos una letra mayúscula, una minúscula, un número y un carácter especial
    var regexMayuscula = /[A-Z]/;
    var regexMinuscula = /[a-z]/;
    var regexNumero = /[0-9]/;
    var regexEspecial = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

    if (!regexMayuscula.test(contraseña) || !regexMinuscula.test(contraseña) || !regexNumero.test(contraseña) || !regexEspecial.test(contraseña)) {
        alert('La contraseña debe contener al menos una letra mayúscula, una minúscula, un número y un carácter especial.');
        contraseñaInput.focus(); // Pone el foco en el campo de contraseña
        return false;
    }

    return true;
}

function validarFormulario() {
    return validarCorreo() && validarContraseña();
}