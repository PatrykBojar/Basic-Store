/*function zoomImage(){
  var img = document.getElementsByClassName("img-product");
  img.classList.add("zoom-img");
}*/

/*function zoomImage() {
  var img = document.getElementsByClassName("img-product");
  for (var i = 0; i < img.length; i++) {
    document.getElementsByTagName('img')[i].classList.add("zoom-img");
  }
  console.log(img);
}*/

function precioProducto(id) {
  var price = document.getElementById(id).innerHTML;
      alert(price);
  }

function slider() {
  var sliderMin = document.getElementById("minRange");
  var outputMin = document.getElementById("minPriceSlider");
  outputMin.innerHTML = sliderMin.value; // Display the default slider value

  var sliderMax = document.getElementById("maxRange");
  var outputMax = document.getElementById("maxPriceSlider");
  outputMax.innerHTML = sliderMax.value; // Display the default slider value

  // Update the current slider value (each time you drag the slider handle)
  sliderMin.oninput = function() {
    outputMin.innerHTML = this.value;
  }
  sliderMax.oninput = function() {
    outputMax.innerHTML = this.value;
  }




















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
