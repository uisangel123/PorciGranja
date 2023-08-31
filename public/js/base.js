//Codigo para que un input tipo date tome la fecha actual a tiempo real.
document.addEventListener('DOMContentLoaded', function () {
    const fechaInicialInput = document.getElementById('Fecha_dinamica');
    const fechaActual = new Date().toISOString().split('T')[0];
    fechaInicialInput.value = fechaActual;
});
//Codigo para visualizar la contraseña
function verClave (inputID,btnID){
    let tipo = document.getElementById(inputID);
    let iconVista = document.getElementById(btnID);
    if(tipo.type == 'password'){
        tipo.type = 'text';
    iconVista.innerHTML = `<i class="fas fa-eye"></i>`;    
    }else{
        tipo.type = 'password';
        iconVista.innerHTML = `<i class="fas fa-eye-slash"></i>`; 
    }
}