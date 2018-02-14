<script>
  function mostra_amb_ajax() {
    //Agafo el valor de la casella d'input
    var nom = document.getElementById("casilla").value;
    /* Una XML HTTP Request permet executar codi en el servidor
     * sense recarregar la pàgina web. És el que es coneix com a "AJAX" */
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("zona_ajax").innerHTML = this.responseText;
      }
    }
    //Paso la variable   nom   com a paràmetre del fitxer  texto2.php
    xmlhttp.open("GET", "view/main/ajax/respuestaAjax.php?nom=" + nom, true);
    xmlhttp.send();
  }
</script>
  </head>
  <footer class="bg-dark">
    <p>¿Quieres recibir promociones? ¡Escribe tu correo electrónico para tener acceso a las ofertas exclusivas!</p>
    <form action="" method="post">
      Correo: <input type="text" id="casilla">
      <input type="submit" value="Enviar" onclick="mostra_amb_ajax()">
    </form>
    <br>
    <div id="zona_ajax">
    </div>

</footer>
