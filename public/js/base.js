var token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

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
                "id_Datos": select,
            },
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function (response) {
                if (response) {
                    let datos = document.getElementById('cantidad');

                    datos.value = response.datos;
                    console.log(response);

                }
            }
        })
    });
    let select = document.getElementById('macho');
    select.addEventListener('change', (event) => {
        let select2 = event.target.value;
        $.ajax({
            url: "/buscarDisponibles",
            method: "POST",
            data: {
                "macho": select2,
            },
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function (response) {
                let selectHembra = document.getElementById('hembra');
            while (selectHembra.firstChild) {
                    selectHembra.removeChild(selectHembra.firstChild);
            }
            let option = document.createElement("option");
            option.value = 'Seleccionar hembra';
            option.text = 'Seleccionar hembra';
            selectHembra.insertBefore(option, selectHembra.firstChild);
            
            // Ahora agregamos las nuevas opciones
            if(select2 != ""){
            for (let i = 0; i < response.hola.length; i++) {
                // Creamos la nueva opción
                let option = document.createElement("option");
                option.value = response.hola[i].id; // Aquí debes cambiar 'id' por el nombre del atributo que contiene el id de la hembra
                option.text = response.hola[i].id; // Aquí debes cambiar 'id' por el nombre del atributo que contiene el nombre de la hembra

                // Añadimos la opción al select
                selectHembra.appendChild(option);
            }
            console.log(response.hola);
            // console.log(select2);
        }
            },
        });
    });
});
//Datos Nacimiento *Cantidad*
function cantidadesCerdos(){
    let total = parseInt(document.getElementById('total').value);
    let repro = parseInt(document.getElementById('reproductores').value);
    let criales = parseInt(document.getElementById('Criales').value);
    let muerto = parseInt(document.getElementById('muertos').value);
    let btn = document.getElementById('submit1');
    if (!isNaN(total) && !isNaN(repro) && !isNaN(criales) && !isNaN(muerto)) {
    let suma = repro + criales + muerto;
        if(suma != total){
            let mensaje = `La cantidad total ${total} es diferente a la de los cerdos ${suma}!`
            mensajeError(mensaje, btn, "error-total");
            btn.style.backgroundColor = "grey";
            btn.disabled = true;
        }else{
            borrarError(btn, "error-total");
            btn.disabled = false;
            btn.style.backgroundColor = "";
        }
 console.log(suma)
    }
}



