
function formatoFechaView(fecha,iscorta=false) {
    var nomFechaEn  = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre' ,'Octubre','Noviembre','Diciembre'];

    if (iscorta){
        nomFechaEn = ["Ene","Febr","Mzo","Abr","My","Jun","Jul","Agto","Sept","Oct","Nov","Dic"];
    }
    const fech = new Date(fecha)
    return fech.getUTCDate()+" "+nomFechaEn[fech.getMonth()].toLowerCase() +" del "+fech.getFullYear()
}

function formatoFechaMes(fecha,iscorta=false) {
    var nomFechaEn  = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre' ,'Octubre','Noviembre','Diciembre'];

    if (iscorta){
        nomFechaEn = ["Ene","Febr","Mzo","Abr","My","Jun","Jul","Agto","Sept","Oct","Nov","Dic"];
    }
   return nomFechaEn[fecha];
}
function abecedario(indx) {
    const abc = ['a','b','c','d','e','f','g','h','i','j','k'];
    return abc[indx];
}