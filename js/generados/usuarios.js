var array;



$("#registro").submit(function(e) {
    e.preventDefault();
    var datos = $(this).serializeArray();
    $.get(registroUsuario, datos, function(data, success) {
        alert("Registro exitoso");
    });
});

$("#iniciarSesion").submit(function(e) {
    e.preventDefault();
    var datos2 = $(this).serializeArray();
    $.get(inicioSesion, datos2, function(data, success) {
        array = data.split(",")
        if (array[1].toString() == datos2[1].value && array[0].toString() == datos2[0].value && array[2] == "lector") {
            var datosPaginaAnterior = document.referrer;
            var paginaAnterior = datosPaginaAnterior.split("?")[0];
            switch (paginaAnterior) {
                case "http://localhost/EX5/index.php":
                    window.location.replace("index.php?nombre=" + array[0] + "&id_usuario=" + array[3]);
                    break;
                case "http://localhost/EX5/":
                    window.location.replace("index.php?nombre=" + array[0] + "&id_usuario=" + array[3]);
                    break;
                case "http://localhost/EX5/visualizacion.php":
                    window.location.replace(datosPaginaAnterior + "&nombre=" + array[0] + "&id_usuario=" + array[3]);
                    break;
                default:
                    window.location.replace("index.php?nombre=" + array[0]);
                    break;
            }
        } else if (array[1].toString() == datos2[1].value && array[0].toString() == datos2[0].value && array[2] == "escritor") {
            window.location.replace(indexEscritor + "?id_usuario=" + array[3] + "&nombre=" + array[0]);
        } else {
            alert("error");
        }

    })
});

$("#formularioComentario").submit(function(e) {
    e.preventDefault();
    if (localStorage.getItem("sesion") == "") {
        window.location.replace("login.html");
    } else {

        var arrayComentario = {
            "id_usuario": localStorage.getItem("id_usuario"),
            "id_articulo": localStorage.getItem("id_articulo"),
            "comentario": $("#comentar").val()

        }
        $.get(agregarComentario, arrayComentario, function(data, success) {
            location.reload();
        });
    }

});