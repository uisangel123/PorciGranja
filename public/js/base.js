// let token = ""; TOKEN CSRF GLOBAL
// function loadUserCredentials() {
//     token = window.localStorage.getItem(LOCAL_TOKEN_KEY);
//     if (token) {
//         useCredentials(token);
//     }
// }

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
    console.log(dato1 + "Input 1");
    console.log(dato2 + "Input 2");
    if (dato1 == dato2) {
        console.log("Son iguales");
    } else {
        console.log('no');
    }
}
// function actualizarContra() { REVISAR SI SE USARA PARA VALACIÓN DE CLAVE

//     $.ajax({
//         url: '/actualizarContra',
//         type: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         async: false,
//         success: function (response) {
//             let hola = response.claveActual;
//             console.log(response + hola);
//         }
//     });

// };

function prueba() {//esperar xd si se maneja ono (activa btn para registrar porcino desde datos nacimiento)
    let repro = document.getElementById('reproductores').value;
    let btn = document.getElementById('btn-registrar');
    if (repro == 0 || repro == '') {
        btn.style.display = 'none';
    } else {
        btn.style.display = 'block';
    }
}

function cerrarMensajes() {//los mensajes de creado, actualizado o eliminado se borraran despues de 5 segundos
    setTimeout(function () {
        $('.cerrarMensaje').fadeOut('slow');
    }, 5000);
}
$(document).ready(function () {//revisar o preguntar mañana en la tarde a Jhair sobre el error q no funciona las peticiones del AJAX por el csrf
    cerrarMensajes();

    $('#id_Datos').change(function () {
        let select = $(this).val();
        $.ajax({
            url: "/buscarDinamico",
            method: "POST",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                "select": select
            },
            success: function (response) {
                $('#cantidad').val(response.related_value);
            }
        })
    });
});



