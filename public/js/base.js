//Codigo para que un input tipo date tome la fecha actual a tiempo real.
document.addEventListener('DOMContentLoaded', function () {
    const fechaInicialInput = document.getElementById('Fecha_dinamica');
    const fechaActual = new Date().toISOString().split('T')[0];
    fechaInicialInput.value = fechaActual;
});
//Codigo para visualizar la contraseña
function verClave(inputID, btnID) {
    let tipo = document.getElementById(inputID);
    let iconVista = document.getElementById(btnID);
    if (tipo.type == 'password') {
        tipo.type = 'text';
        iconVista.innerHTML = `<i class="fas fa-eye"></i>`;
    } else {
        tipo.type = 'password';
        iconVista.innerHTML = `<i class="fas fa-eye-slash"></i>`;
    }
}
//validar datos de input
function validaciónInput() {
    let passwordActual = document.getElementById("");
    let passwordNueva = document.getElementById("");
    let passwordConfirmar = document.getElementById("");
    if (
        passwordActual != "" &&
        passwordNueva != "" &&
        passwordConfirmar != "" &&
        passwordActual.value.length >= 8 &&
        passwordNueva.value.length >= 8 &&
        passwordConfirmar.value.length >= 8
    ) {

    }
}
function soloNumeros(e, id) {
    let input = document.getElementById(id);
    let data = e.keyCode || e.which;

    if (!(data >= 48 && data <= 57) || (data >= 96 && data <= 105)) {
        let mensaje = "Solo se permite digitos numericos!"
        mensajeError(mensaje, input, "error-telefono");
        e.preventDefault();
        console.log("No entra :D" + input)
    } else {
        borrarError(input, "error-telefono");
    }
    console.log('hola :D' + e.keyCode)
}

function mensajeError(mensaje, input, errorElementId) {
    let errorElement = document.getElementById(errorElementId);
    if (errorElement) {
        errorElement.innerHTML = mensaje;
    } else {
        if (input) {
            input.classList.add('is-invalid-input');
            input.insertAdjacentHTML("afterend", "<div id='" + errorElementId + "' class='invalid-input is-invalid-input'>" + mensaje + "</div>");
        }
    }
}

function borrarError(input, errorElementId) {
    let errorElement = document.getElementById(errorElementId);

    if (errorElement) {
        errorElement.remove();
        input.classList.remove('is-invalid-input');
    }
}

function compararClave(dato, datoC) {//revisar por consola
    let dato1 = document.getElementById(dato).value;
    let dato2 = document.getElementById(datoC).value;
    console.log(dato1, dato2);
    if (dato1 == dato2) {
        console.log("Son iguales");
    } else {
        console.log('no');
    }
}
