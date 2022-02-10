$(document).on('click', "#prueba", function(e) {
    e.preventDefault();
    window.location.replace("visualizacion.php?nombre=" + localStorage.getItem("sesion") + "&id_usuario=" + localStorage.getItem("id_usuario"))
});

$(".partidos").click(function() {
    window.location.replace(tablaArticulos + "?tema=partido&valor=" + $(this).attr("value") + "&nombre=" + localStorage.getItem("sesion") + "&id_usuario=" + localStorage.getItem("id_usuario"));
})
$(".btn-info").click(function() {
    trid = $(this).closest('tr').attr('value');
    window.location.replace(tablaArticulos + "?tema=estado&valor=" + trid + "&nombre=" + localStorage.getItem("sesion") + "&id_usuario=" + localStorage.getItem("id_usuario"));
})

$("#agregarArticulo").click(function(e) {
    e.preventDefault();
    window.location.replace(nuevoArticulo + "?id_usuario=" + localStorage.getItem("id_usuario") + "&nombre=" + localStorage.getItem("sesion"));
});