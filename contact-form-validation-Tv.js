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
    estacion = document.getElementById("estacion").value;
    titulo = document.getElementById("titulo").value;
    precio = document.getElementById("precio").value;
}

function isPositiveInteger(s) {
  return /^\+?[1-9][\d]*$/.test(s);
}

function validateForm() {
    var success = true
    var canal = document.forms["contact-form"]["canal"].value;
    if (canal == "") {
        alert("El campo canal es obligatorio");
        success = false;
    }
    if (!isPositiveInteger(canal)){
        alert("El campo canal es inválido");
        success = false;
    }

    var titulo = document.forms["contact-form"]["titulo"].value;
    if (titulo == "") {
        alert("El campo titulo es obligatorio");
        success  = false
    }

    var precio = document.forms["contact-form"]["precio"].value;
    if (precio == "") {
        alert("El campo precio es obligatorio");
        success = false
    }
    if (!isPositiveInteger(precio)){
        alert("El campo precio es inválido");
        success = false;
    }

    if (success == true){
        alert("Registro exitoso.")
    }

}