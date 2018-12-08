/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function myFunction() {
    var nombre, text;
    var correo;
    var asunto;
    var mensaje;

    // Get the value of the input field with id="numb"
    nombre = document.getElementById("nombre").value;
    correo = document.getElementById("correo").value;
    asunto = document.getElementById("asunto").value;
    mensaje = document.getElementById("mensaje").value;
    
    text = "Estimado " + nombre + ", con Correo: " + correo + ", respecto al asunto " + asunto + ", su mensaje fue: " + mensaje;
    document.getElementById("demo").innerHTML = text;
}

function validateForm() {
    var success = true
    var name = document.forms["contact-form"]["name"].value;
    if (name == "") {
        alert("El campo nombre es obligatorio");
        success = false
    }

    var email = document.forms["contact-form"]["email"].value;
    if (email == "") {
        alert("El campo email es obligatorio");
        success = false;
    }

    var subject = document.forms["contact-form"]["subject"].value;
    if (subject == "") {
        alert("El campo asunto es obligatorio");
        success  = false
    }

    var message = document.forms["contact-form"]["message"].value;
    if (message == "") {
        alert("El campo mensaje es obligatorio");
        success = false
    }

    if (success == true){
        alert("Mensaje enviado exitosamente!")
    }

}

function myMap() {
var mapProp= {
    center:new google.maps.LatLng(21.048141,-89.641348),
    zoom:15
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
