const expresiones = {
    boleta: /^(PP|PE)[0-9]{8}|([0-9]{10})$/,
    nombre: /^([A-Z][a-z]+)|([A-Z][a-z]+\s[A-Z][a-z]+)$/,
    apellido: /^[A-Z][a-z]+$/,
    curp: /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/,
    cp: /^[0-9]{5}$/,
    correo: /^\S+@\S+\.\S+$/,
    telefono: /^(55|56)[0-9]{8}$/,
    solonum: /^[0-9]+$/,
    soloalpha: /^[0-9a-zA-Z\s]+$/
}

//Validacion de la boleta
const validarBoleta = (e) => {
    if (expresiones.boleta.test(e.target.value)) {
        document.getElementsByName('boleta')[0].classList.remove('is-invalid');
        document.getElementsByName('boleta')[0].classList.add('is-valid');
    }
    else{
        document.getElementsByName('boleta')[0].classList.add('is-invalid');
        document.getElementsByName('boleta')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('boleta')[0].addEventListener('keyup', validarBoleta);
document.getElementsByName('boleta')[0].addEventListener('blur', validarBoleta);

//Validacion de nombre
const validarNombre = (e) => {
    if (expresiones.nombre.test(e.target.value)) {
        document.getElementsByName('nombre')[0].classList.remove('is-invalid');
        document.getElementsByName('nombre')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('nombre')[0].classList.add('is-invalid');
        document.getElementsByName('nombre')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('nombre')[0].addEventListener('keyup', validarNombre);
document.getElementsByName('nombre')[0].addEventListener('blur', validarNombre);

//Validacion apellidos
const validarPaterno = (e) => {
    if (expresiones.apellido.test(e.target.value)) {
        document.getElementsByName('apaterno')[0].classList.remove('is-invalid');
        document.getElementsByName('apaterno')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('apaterno')[0].classList.add('is-invalid');
        document.getElementsByName('apaterno')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('apaterno')[0].addEventListener('keyup', validarPaterno);
document.getElementsByName('apaterno')[0].addEventListener('blur', validarPaterno);

const validarMaterno = (e) => {
    if (expresiones.apellido.test(e.target.value)) {
        document.getElementsByName('amaterno')[0].classList.remove('is-invalid');
        document.getElementsByName('amaterno')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('amaterno')[0].classList.add('is-invalid');
        document.getElementsByName('amaterno')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('amaterno')[0].addEventListener('keyup', validarMaterno);
document.getElementsByName('amaterno')[0].addEventListener('blur', validarMaterno);

//Validacion de CURP
const validarCURP = (e) => {
    if (expresiones.curp.test(e.target.value)) {
        document.getElementsByName('curp')[0].classList.remove('is-invalid');
        document.getElementsByName('curp')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('curp')[0].classList.add('is-invalid');
        document.getElementsByName('curp')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('curp')[0].addEventListener('keyup', validarCURP);
document.getElementsByName('curp')[0].addEventListener('blur', validarCURP);

//Validacion de Calle
const validarCalle = (e) => {
    if (expresiones.soloalpha.test(e.target.value)) {
        document.getElementsByName('calle')[0].classList.remove('is-invalid');
        document.getElementsByName('calle')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('calle')[0].classList.add('is-invalid');
        document.getElementsByName('calle')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('calle')[0].addEventListener('keyup', validarCalle);
document.getElementsByName('calle')[0].addEventListener('blur', validarCalle);

//Validacion de No
const validarNO = (e) => {
    if (expresiones.solonum.test(e.target.value)) {
        document.getElementsByName('no')[0].classList.remove('is-invalid');
        document.getElementsByName('no')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('no')[0].classList.add('is-invalid');
        document.getElementsByName('no')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('no')[0].addEventListener('keyup', validarNO);
document.getElementsByName('no')[0].addEventListener('blur', validarNO);

//Validacion de Colonia
const validarColonia = (e) => {
    if (expresiones.soloalpha.test(e.target.value)) {
        document.getElementsByName('colonia')[0].classList.remove('is-invalid');
        document.getElementsByName('colonia')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('colonia')[0].classList.add('is-invalid');
        document.getElementsByName('colonia')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('colonia')[0].addEventListener('keyup', validarColonia);
document.getElementsByName('colonia')[0].addEventListener('blur', validarColonia);


//Validacion de CP
const validarCP = (e) => {
    if (expresiones.cp.test(e.target.value)) {
        document.getElementsByName('cp')[0].classList.remove('is-invalid');
        document.getElementsByName('cp')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('cp')[0].classList.add('is-invalid');
        document.getElementsByName('cp')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('cp')[0].addEventListener('keyup', validarCP);
document.getElementsByName('cp')[0].addEventListener('blur', validarCP);


//Validacion de correo
const validarCorreo = (e) => {
    if (expresiones.correo.test(e.target.value)) {
        document.getElementsByName('correo')[0].classList.remove('is-invalid');
        document.getElementsByName('correo')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('correo')[0].classList.add('is-invalid');
        document.getElementsByName('correo')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('correo')[0].addEventListener('keyup', validarCorreo);
document.getElementsByName('correo')[0].addEventListener('blur', validarCorreo);

//Validacion de Telefono
const validarTelefono = (e) => {
    if (expresiones.telefono.test(e.target.value)) {
        document.getElementsByName('tel')[0].classList.remove('is-invalid');
        document.getElementsByName('tel')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('tel')[0].classList.add('is-invalid');
        document.getElementsByName('tel')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('tel')[0].addEventListener('keyup', validarTelefono);
document.getElementsByName('tel')[0].addEventListener('blur', validarTelefono);

//Validacion de Nombre de Escuela
const validarName = (e) => {
    if (expresiones.solotxt.test(e.target.value)) {
        document.getElementsByName('escuela')[0].classList.remove('is-invalid');
        document.getElementsByName('escuela')[0].classList.add('is-valid');
    } else {
        document.getElementsByName('escuela')[0].classList.add('is-invalid');
        document.getElementsByName('escuela')[0].classList.remove('is-valid');
    }
}

document.getElementsByName('escuela')[0].addEventListener('keyup', validarName);
document.getElementsByName('escuela')[0].addEventListener('blur', validarName);

//Desactivacion del Campo "Nombre de la Escuela"
function cambio(e) {
    if(e.value != "otro"){
        document.getElementsByName('escuela')[0].value = "";
        document.getElementsByName('escuela')[0].disabled = true;
    }
    else{
        document.getElementsByName('escuela')[0].disabled = false;
        document.getElementsByName('escuela')[0].value = "";
    }
}

$(window).resize(function() {
    if (window.matchMedia('(max-width: 767px)').matches) {
        $('#escom-logo').hide();
        $('#ipn-logo').hide();
    }
    else{
        $('#escom-logo').show();
        $('#ipn-logo').show();
    }
});
