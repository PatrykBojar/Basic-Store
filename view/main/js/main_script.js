/*function zoomImage(){
  var img = document.getElementsByClassName("img-product");
  img.classList.add("zoom-img");
}*/

function zoomImage() {
  var img = document.getElementsByClassName("img-product");
  for (var i = 0; i < img.length; i++) {
    document.getElementsByTagName('img')[i].classList.add("zoom-img");
  }
  console.log(img);
}
