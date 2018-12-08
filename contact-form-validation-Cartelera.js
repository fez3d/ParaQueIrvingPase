/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function myFunction() {
    var id, text;
    var direccion;
    var titulo;
    var precio;

    // Get the value of the input field with id="numb"
    id = document.getElementById("id").value;
    direccion = document.getElementById("direccion").value;
    titulo = document.getElementById("titulo").value;
    precio = document.getElementById("precio").value;
}
function isPositiveInteger(s) {
  return /^\+?[1-9][\d]*$/.test(s);
}

function validateForm() {
    var success = true;
    var id = document.forms["contact-form"]["id"].value;
    if (id == "") {
        alert("El campo id es obligatorio.");
        success = false;
        return;
    }
    if (!isPositiveInteger(document.forms["contact-form"]["id"].value)){
        alert("El campo id debe ser un número entero.");
        success = false;
        return;
    }

    var direccion = document.forms["contact-form"]["direccion"].value;
    if (direccion == "") {
        alert("El campo direccion es obligatorio.");
        success = false;
        return;
    }

    var titulo = document.forms["contact-form"]["titulo"].value;
    if (titulo == "") {
        alert("El campo titulo es obligatorio.");
        success  = false;
        return;
    }

    var precio = document.forms["contact-form"]["precio"].value;
    if (precio == "") {
        alert("El campo precio es obligatorio.");
        success = false;
        return;
    }
    if (!isPositiveInteger(precio)){
        alert("El campo precio debe ser un número entero.");
        success = false;
        return;
    }

    if (success == true){
        alert("Registro exitoso.");
    }
}