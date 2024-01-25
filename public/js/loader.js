
function preload(image, url) {
    fetch(url).then(request => request.blob()).then(() => {
        image.src = url;
    });
}
preload(document.getElementsByClassName('img-loader')[0],document.getElementById('imagen-load').value);
setTimeout(function () {
     document.getElementById("fondo-animacion").classList.add("animacion-fondo2");
},2000)

var inicio_web = new Date;
document.addEventListener("DOMContentLoaded", function(event) {
    var fin_carga_web = new Date;
    var segundos = (fin_carga_web-inicio_web)/1000;
    if (segundos < 3){
        setTimeout(function () {
            $(".imagen_loager").addClass('img-scale-animation')
            $(".lds-roller").addClass('quitar-vicivilidad')
            setTimeout(function () {
               $("#loader").addClass('degradel-delete');
                setTimeout(function () {
                    $("#loader").hide()
                },1100);
            },500)

        },3000 - (segundos*1000))
    }else{
        setTimeout(function () {
            $(".imagen_loager").addClass('img-scale-animation')
            $(".lds-roller").addClass('quitar-vicivilidad')
            setTimeout(function () {
                $("#loader").addClass('degradel-delete');
                setTimeout(function () {
                    $("#loader").hide()
                },1100);
            },500)

        },3000 - (segundos*1000))
    }
});
