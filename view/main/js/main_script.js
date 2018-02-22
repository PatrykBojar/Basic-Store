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

$('body').on('mouseenter mouseleave', '.desplegar', function(e) {
  var _d = $(e.target).closest('.desplegar');
  _d.addClass('show');
  setTimeout(function() {
    _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
  }, 300);
});

$('#addWidth').click(function() {
  alert("Background color");
});
