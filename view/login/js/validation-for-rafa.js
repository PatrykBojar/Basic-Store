window.onload = function() {
  var formularios = document.forms;
  var mensaje1 = document.getElementById("infoUser1"),
    mensaje2 = document.getElementById("infoUser2"),
    mensaje3 = document.getElementById("infoUser3"),
    mensaje4 = document.getElementById("infoUser4"),
    mensaje5 = document.getElementById("infoUser5"),
    mensaje6 = document.getElementById("infoUser6"),
    mensaje7 = document.getElementById("infoUser7"),
    infoPasswd = document.getElementById("infoPasswd");
  // Vamos buscando formularios y le añadimos un name si lo encontramos.
  // formulario0, formulario1...
  // Cuando se active el evento onsubmit se ejecutará el código dentro de la
  // función enviar.
  for (var i = 0; i < formularios.length; i++) {
    for (var j = 0; j < formularios[i].className.length; j++) {
      if (formularios[i].className == "register") {
        formularios[i].onsubmit = enviar;
      }
    }
    formularios[i].name = "formulario" + i;
  }

  function enviar() {
    // Variables semáforo o bandera que permiten la correcta validación de
    // todos los campos. Por defecto supones que todos los campos están mal.
    var usuarioBien = false;
    var nombreBien = false;
    var email = false;
    var address = false;
    var zipCode = false;
    var passwd = false;
    var passwd_check = false;

    // Scamos todos los elementos del formulario a partir de la id.
    // También el valor.
    for (var i = 0; i < this.length; i++) {
      var valorCampo = this[i].value;
      // Comprobación del nombre de usuario, el campo no puede estar vacío y
      // tiene que tener más de 4 caracteres, puede contener valores númericos.
      if (this[i].id == "username2") {
        if (this[i].value.length == 0 || this[i].value == " ") {
          mensaje1.innerHTML = "¡El nombre de usuario no puede estar vacío!";
          mensaje1.classList.add("text-danger");
          usuarioBien = false;
        } else if (this[i].value.length < 4) {
          mensaje1.innerHTML = "El nombre de usuario tiene que tener mínimo 4 caracteres.";
          mensaje1.classList.add("text-danger");
          usuarioBien = false;
        } else if (this[i].value.length > 65) {
          mensaje1.innerHTML = "¡El nombre de usuario permite un máximo de 64 caracteres!";
          mensaje1.classList.add("text-danger");
          usuarioBien = false;
        } else {
          mensaje1.innerHTML = "¡Qué creativo!";
          mensaje1.classList.replace("text-danger", "text-success");
          usuarioBien = true;
        }
      }
      // Comprobación del nombre de pila. No puede contener números.
      // Permitimos letras, espacios, puntos, apóstrofo...
      var regex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
      if (this[i].id == "fullname2") {
        if (this[i].value.length == 0 || this[i].value == " ") {
          mensaje2.innerHTML = "¡El nombre no puede estar vacío!";
          mensaje2.classList.add("text-danger");
          nombreBien = false;
        } else if (this[i].value.length < 3) {
          mensaje2.innerHTML = "El nombre debe de tener mínimo 3 caracteres.";
          mensaje2.classList.add("text-danger");
          nombreBien = false;
        } else if (regex.test(this[i].value) == false) {
          mensaje2.innerHTML = "El nombre solo puede contener caracteres alfbéticos.";
          mensaje2.classList.add("text-danger");
          nombreBien = false;
        } else if (this[i].value.length > 50) {
          mensaje2.innerHTML = "¡Tu nombre no puede tener más de 50 caracteres!";
          mensaje2.classList.add("text-danger");
          nombreBien = false;
        } else {
          mensaje2.innerHTML = "¡Un nombre fantástico!";
          mensaje2.classList.replace("text-danger", "text-success");
          nombreBien = true;
        }
      }

      // Comprobación del correo eletrónico, simple.
      var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (this[i].id == "email2") {
        if (this[i].value.length == 0 || this[i].value == " ") {
          mensaje3.innerHTML = "¡El correo no puede estar vacío!";
          mensaje3.classList.add("text-danger");
          email = false;
        } else if (regex.test(this[i].value) == false) {
          mensaje3.innerHTML = "¡El formato del correo es incorecto!";
          mensaje3.classList.add("text-danger");
          email = false;
        } else if (this[i].value.length > 50) {
          mensaje3.innerHTML = "¡Correo demasiado largo!";
          mensaje3.classList.add("text-danger");
          email = false;
        } else {
          mensaje3.innerHTML = "¡Correcto!";
          mensaje3.classList.replace("text-danger", "text-success");
          email = true;
        }
      }
      // Comprobamos si la dirección está escrita con un formato correcto, ¡acepta números y
      // los mensajes de respuesta son muy graciosos!
      if (this[i].id == "address2") {
        if (this[i].value.length == 0 || this[i].value == " ") {
          mensaje4.innerHTML = "¿Cómo vamos a enviarte los productos?";
          mensaje4.classList.add("text-danger");
          address = false;
        } else if (this[i].value.length < 3) {
          mensaje4.innerHTML = "La dirección debe de tener mínimo 3 caracteres.";
          mensaje4.classList.add("text-danger");
          address = false;
        } else if (this[i].value.length > 100) {
          mensaje4.innerHTML = "¡Dirección muy larga!";
          mensaje4.classList.add("text-danger");
          address = false;
        } else {
          mensaje4.innerHTML = "¡Ya te tenemos fichado!";
          mensaje4.classList.replace("text-danger", "text-success");
          address = true;
        }
      }
      // Expresión regular para validar un código postal de España,
      // porque somos muy españoles y muy España.
      var regex = /0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}/;
      if (this[i].id == "zipCode2") {
        if (this[i].value.length == 0 || this[i].value == " ") {
          mensaje5.innerHTML = "¿Cómo vamos a enviarte los productos?";
          mensaje5.classList.add("text-danger");
          zipCode = false;
        } else if (regex.test(this[i].value) == false) {
          mensaje5.innerHTML = "¡Solo aceptamos códigos postales de España!";
          mensaje5.classList.add("text-danger");
          zipCode = false;
        } else if (this[i].value.length > 5) {
          mensaje5.innerHTML = "¡Código postal muy largo!";
          mensaje5.classList.add("text-danger");
          zipCode = false;
        } else {
          mensaje5.innerHTML = "¡Bien hecho!";
          mensaje5.classList.replace("text-danger", "text-success");
          zipCode = true;
        }
      }
      // Mínimo 8 caracteres, máximo 32.
      // Al menos 1 mayúscula y minúscula.
      // Dígitos y caracteres especiales.
      var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,32}$/;
      if (this[i].id == "password2") {
        if (this[i].value.length == 0 || this[i].value == " ") {
          mensaje6.innerHTML = "¡La contraseña no puede estar vacía!";
          mensaje6.classList.add("text-danger");
          passwd = false;
        } else if (this[i].value.length < 8) {
          mensaje6.innerHTML = "¡Mínimo 8 caracteres!";
          mensaje6.classList.add("text-danger");
        } else if (regex.test(this[i].value) == false) {
          mensaje6.innerHTML = "¡Contraseña demasiado débil!";
          infoPasswd.innerHTML = "Al menos una mayúscula y minúscula, dígito y caracter especial.";
          mensaje6.classList.add("text-danger");
          passwd = false;
        } else if (this[i].value.length > 32) {
          mensaje6.innerHTML = "¡La contraseña puede tener una longitud máxima de 32 caracteres!";
          mensaje6.classList.add("text-danger");
          passwd = false;
        } else {
          mensaje6.innerHTML = "¡Fantástico!";
          mensaje6.classList.replace("text-danger", "text-success");
          infoPasswd.innerHTML = "";
          passwd = true;
        }
      }
      // Comprobamos si las dos contraseñas coinciden.
      if (password2.value != password_check2.value) {
        mensaje7.innerHTML = "¡Las contraseñas no coinciden!";
        mensaje7.classList.add("text-danger");
        passwd_check = false;
      } else {
        mensaje7.innerHTML = "";
        passwd_check = true;
      }

    }
    if (usuarioBien == true && nombreBien == true && email == true && address == true && zipCode == true && passwd == true && passwd_check == true) {
      return true;

    } else {
      return false;
    }
  }

}
