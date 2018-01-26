
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
    $('body').popover({content: "Crea una cuenta o entra en una ya existente.", selector: "#btn-identificacion", trigger: "hover"});
});
