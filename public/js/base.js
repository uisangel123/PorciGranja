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
            url: "/buscarLote",//fue cambiado de nacimiento a lote porq igual deb buscar la forma correcta de manejar los datos nacimiento en el lote, en el mismo lote o desde nacimiento
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

                    datos.value = response.buscarDatos;
                    console.log(response);
                    console.log(response.buscarDatos)
                    console.log(response.datos)


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
                if (select2 != "") {
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
function cantidadesCerdos() {
    let total = parseInt(document.getElementById('total').value);
    let repro = parseInt(document.getElementById('reproductores').value);
    let criales = parseInt(document.getElementById('Criales').value);
    let muerto = parseInt(document.getElementById('muertos').value);
    let vivo = parseInt(document.getElementById('vivos').value);
    let btn = document.getElementById('submit1');
    if (!isNaN(total) && !isNaN(repro) && !isNaN(criales) && !isNaN(muerto) && !isNaN(vivo)) {
        let suma = repro + criales + muerto;
        if (suma != total || (muerto + vivo) != total) {
            let mensaje = `La cantidad total ${total} es diferente a la de los cerdos ${suma}!`
            mensajeError(mensaje, btn, "error-total");
            btn.style.backgroundColor = "grey";
            btn.disabled = true;
        } else {
            borrarError(btn, "error-total");
            btn.disabled = false;
            btn.style.backgroundColor = "";
        }
        console.log(suma)
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const contenedor = document?.querySelector('#dinamico');
    const btnSemana = document?.getElementById('agregarSemana');
    let contadorSemana = 2;//recordar agregar esto para el numero de semanas, pero claro mirando el espacio
    btnSemana?.addEventListener('click', () => {
        let div = document?.createElement('div');
        div.className = 'row';
        div.innerHTML = `
    <hr>
    <div class="col-md-1">
    <div class="form-group">
        <label for="semana">Semana</label>
        <input class="form-control" id="semana" placeholder="Semana" name="Semana[]" type="text" oninput="calcularPromedioDiario(this)" >
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        <label for="dia_1">Dia 1</label>
        <input class="form-control" id="dia_1" placeholder="Dia 1" name="dia_1[]" type="text" oninput="calcularPromedioDiario(this)" pattern="^[0-9]+$">
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-1">
    <div class "form-group">
        <label for="dia_2">Dia 2</label>
        <input class="form-control" id="dia_2" placeholder="Dia 2" name="dia_2[]" type="text" oninput="calcularPromedioDiario(this)">
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        <label for="dia_3">Dia 3</label>
        <input class="form-control" id="dia_3" placeholder="Dia 3" name="dia_3[]" type="text" oninput="calcularPromedioDiario(this)">
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        <label for="dia_4">Dia 4</label>
        <input class="form-control" id="dia_4" placeholder="Dia 4" name="dia_4[]" type="text" oninput="calcularPromedioDiario(this)">
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        <label for="dia_5">Dia 5</label>
        <input class="form-control" id="dia_5" placeholder="Dia 5" name="dia_5[]" type="text" oninput="calcularPromedioDiario(this)">
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        <label for="dia_6">Dia 6</label>
        <input class="form-control" id="dia_6" placeholder="Dia 6" name="dia_6[]" type="text" oninput="calcularPromedioDiario(this)">
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        <label for="dia_7">Dia 7</label>
        <input class="form-control" id="dia_7" placeholder="Dia 7" name="dia_7[]" type="text" oninput="calcularPromedioDiario(this)">
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <label for="promedio_semanal">Prom Semanal</label>
        <input class="form-control" id="promedio_semanal" placeholder="Promedio Semanal" name="promedio_semanal[]" type="text" readonly>
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <label for="promedio_diario">Prom Diario</label>
        <input class="form-control" id="promedio_diario" placeholder="Promedio Diario" name="promedio_diario[]" type="text" readonly>
        <div class="invalid-feedback"></div>
    </div>
</div>
<div class="form-group">
            <input name="id[]" type="hidden">
            </div>
`;
        contenedor.appendChild(div);
    });
    const contenedorDatosLote = document?.querySelector('#dinamicoDatos');
    const btnDatosLote = document?.getElementById('agregarDatos');
    btnDatosLote?.addEventListener('click', () => {
        let div = document.createElement('div');
        div.innerHTML = `
        <div class="form-group">
    <label for="id_Datos">Seleccione una Piara</label>
    <select name="id_Datos" id="id_Datos" class="form-control">
        <option value="">Seleccione una Piara</option>
        <?php foreach ($datos as $dato): ?>
            <option value="<?php echo $dato['id']; ?>"><?php echo $dato['id']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
        `;
        contenedorDatosLote.appendChild(div);
    });
    let datosLote = document.getElementById('lotes');
    datosLote.addEventListener('change', (event) => {
        $.ajax({
            url: "/buscarEtapaLote",
            method: "POST",
            data: {
            },
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function (response) {
            },
        });
    });

});
function calcularPromedioDiario(input) {
    // Obtén el contenedor padre del input actual (la fila)
    const row = input.closest('.row');

    // Obtén todos los inputs de los días
    const diasInputs = row.querySelectorAll('input[name^="dia_"]');

    // Inicializa la suma
    let suma = 0;

    // Recorre todos los inputs de los días
    for (let i = 0; i < diasInputs.length; i++) {
        // Suma el valor del input al total (conviértelo a número primero)
        suma += Number(diasInputs[i].value);
    }

    // Calcula el promedio
    const promedio = suma / diasInputs.length;

    // Encuentra el input del promedio diario y asigna el valor del promedio
    const promedioDiarioInput = row.querySelector('input[name="promedio_semanal[]"]');
    promedioDiarioInput.value = promedio.toFixed(2); // Redondea a 2 decimales
}




