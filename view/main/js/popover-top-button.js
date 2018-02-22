$(document).ready(function() {
  $('[data-toggle="popover"]').popover();
  $('body').popover({
    content: "Este botón te permite filtros los productos dependiendo de dónde estés.",
    selector: "#btn-filtro",
    trigger: "hover",
    placement: "bottom"
  });
});
