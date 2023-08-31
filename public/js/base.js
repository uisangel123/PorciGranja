//Codigo para que un input tipo date tome la fecha actual a tiempo real.
document.addEventListener('DOMContentLoaded', function () {
    const fechaInicialInput = document.getElementById('Fecha_dinamica');
    const fechaActual = new Date().toISOString().split('T')[0];
    fechaInicialInput.value = fechaActual;
});
//Codigo para visualizar la contraseña
function verClave (){
    let tipo = document.getElementById('password');
    if(tipo.type == 'password'){
        tipo.type = 'text';
    }else{
        tipo.type = 'password';
    }
}