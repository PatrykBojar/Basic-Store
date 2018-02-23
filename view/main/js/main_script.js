function precioProducto(id) {
  var price = document.getElementById(id).innerHTML;
  alert(price);
}

// Actualiza el valor del Slider y lo muestra en el modal de filtros.
function slider() {
  var sliderMin = document.getElementById("minRange");
  var outputMin = document.getElementById("minPriceSlider");
  // Muestra el valor por defecto del Slider.
  outputMin.innerHTML = sliderMin.value;

  var sliderMax = document.getElementById("maxRange");
  var outputMax = document.getElementById("maxPriceSlider");
  outputMax.innerHTML = sliderMax.value;

  // Actualizamos el valor del Slider cada vez que movemos el slider.
  sliderMin.oninput = function() {
    outputMin.innerHTML = this.value;
  }
  sliderMax.oninput = function() {
    outputMax.innerHTML = this.value;
  }
}


// Añade una clase de CSS cuando pasemos el ratón por encima de la imagen.
// Se podría hacerlo con img.height y img.width. Pero el aumento sería instantáneo,
//  así que he optado por una transición de CSS para hacerlo fluído.
function zoomImg(img) {
  img.classList.add("img-js");
}

// Método para contar el número de clics que hemos dado a un botón.
// Simula "Añadir al carrito" con lenguaje PHP.
var valor = 0;
function contador(){
  valor += 1;
  var span = document.getElementById("contador").innerHTML = valor;
}





/**
 * Suma más uno en el input de cantidades del carrito cada vez que se haga clic en el botón
 * @param  integer id id del producto
 */
function sumCantidad(id) {
  document.getElementById("cantidad" + id).stepUp(1);
}
/**
 * Resta menos uno en el input de cantidades del carrito cada vez que se haga clic en el botón
 * @param  integer id id del producto
 */
function resCantidad(id) {
  document.getElementById("cantidad" + id).stepDown(1);
}

function showMenu() {
  var menu = document.getElementById("jsDropdown");
  menu.classList.add("d-block");
}

function hideMenu() {
  var menu = document.getElementById("jsDropdown");
  menu.classList.replace("d-block", "d-hide");
}







// Código para desplegar el dropdown mediante JQuery y Bootstrap.
// Parte de David.
$('body').on('mouseenter mouseleave', '.desplegar', function(e) {
  var _d = $(e.target).closest('.desplegar');
  _d.addClass('show');
  setTimeout(function() {
    _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
  }, 300);
});

/*
$('#addWidth').click(function() {
  alert("Background color");
});
*/
