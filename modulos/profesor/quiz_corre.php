<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
<?php
$conexion = (new Conexion())->getConexion();

$intent = Tools::decrypt(questionario);

$sql ="SELECT * FROM examen_iniciado WHERE iniciado_id='$intent'";
$_resp = $conexion->query($sql)->fetch_assoc();

$idquiz =$_resp['id_cuestio'];
$estudiante_id =$_resp['id_estudiante'];

$sql=" SELECT * FROM cuestionario WHERE cuestionario_id='$idquiz'";

$contenido= null;
if ($contenido = $conexion->query($sql)->fetch_assoc()){

}

$sql =" SELECT * FROM actividad_curso WHERE actividad_id = '{$contenido['id_actividad']}'";
$actividad = $conexion->query($sql)->fetch_assoc();

?>
<link rel="stylesheet" href="<?= URL::to('public/css/matricula_register.css') ?>">
<style>
    .contenedor-curso {
        border-radius: 10px;
        border: 1px solid rgba(4, 133, 34, 0.76);
        overflow: hidden;
        padding: 5px;
        background-color: #00a65a;
    }

    .contenedor-curso:hover {
        cursor: pointer;


    }
    .contenedor-actividad{
        overflow: hidden;
        border-radius: 10px;
        -webkit-box-shadow: 0px -1px 7px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px -1px 7px 0px rgba(0,0,0,0.75);
        box-shadow: 0px -1px 7px 0px rgba(0,0,0,0.75);
    }
    .contene-quiz{
        background-color: #00a65a12;
        border: 1px solid #00a65a;
        border-radius: 5px;
    }
    .head-content-quiz{
        padding: 10px;
        border-bottom: 1px solid #acacac;
        min-height: 20px;
        overflow: hidden;
    }
    .footer-content-quiz{
        padding: 7px;
        border-top: 1px solid #acacac;
        min-height: 20px;
    }
    .body-content-quiz{
        padding: 8px;
    }
    .content-box-curso {
        height: 200px;
        background-color: beige;
        border-radius: 5px;
    }
    .contenedor-respuessta-escrito{
        padding: 5px;
        background-color: #fcf8e3;
        border: 1px solid #d0c89e;
        border-radius: 5px;
    }
    .con-extra-data{
        height: 151px;
        background-color: #ecf0f5;
        border: 1px solid #00000059;
        border-radius: 10px;
    }
</style>
<script>
    var nota_final =0;
</script>
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<input type="hidden" value="<?= Tools::encrypt($contenido['id_actividad']) ?>" id="actividad_cod">
<input type="hidden" value="<?= Tools::encrypt($idquiz) ?>" id="quiz_id">
<input type="hidden" value="<?= Tools::encrypt($intent) ?>" id="intent">
<input type="hidden" value="<?= Tools::encrypt($estudiante_id) ?>" id="estudiante">
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include 'funcionalidades/fragment/header.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'funcionalidades/fragment/nav_bar_aside_alumnos.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 850px;height: 93vh;overflow: auto;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cursos
                <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>cursos</a></li>
                <li class="active">mis cursos</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content" id="contenedor-primario">

            <!-- Default box  visited -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 style="font-weight: bold;" class="box-title">Mis cursos</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <button onclick="APP.guardarinformacion()" class="btn btn-primary"> <i class="fa fa-save" ></i> Guardar</button>
                            <a id="ir_atras" href="<?=URL::to('profesores/examen/'.Tools::encrypt($contenido['id_actividad']))?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="padding: 10px;min-height: 527px;">
                        <div class="col-md-12 text-center" style="">
                            <h2 style="font-weight: bold;"><?=$actividad['nombre_activid']?></h2>
                        </div>
                        <div class="col-md-12">

                            <div class="col-md-8 col-md-offset-2">
                                <div class="col-md-12 text-center">
                                    <strong><h3>Configuracion</h3></strong>
                                </div>
                            </div>
                        </div>
                        <hr width=50%>
                        <div class="col-md-12" id="conenedor-ex-quiz">





                        </div>



                    </div>



                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->

        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <?php include 'funcionalidades/fragment/footer.php' ?>
    <script src="<?= URL::to('public/plugins/summernote/summernote-lite.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.js"></script>
</body>

<script>
    function setdata(cod) {
        $.ajax({
            type: "POST",
            url: URL+"/ajax/actividadcurso",
            data: {tipo:'quiz_dat',pre:cod},
            success: function (resp) {
                console.log(resp)
                APP.setDataE(JSON.parse(resp));
            }
        });
    }
    function del(cod) {
        $("#loader-menor").show()
        $.ajax({
            type: "POST",
            url: URL+"/ajax/actividadcurso",
            data: {tipo:'quiz_del',pre:cod},
            success: function (resp) {
                console.log(resp)
                APP.getData();
            }
        });

    }

const APP = new Vue({
    el:"#contenedor-primario",
    data:{
        datConf:{
            duracion_minutos:'',
            nota_visible:false,
            respuesta_visible:false,
        },
        opd:false,
        doc_cont:'',
        cod_pre:'',
        tipo_pregunta:'1',
        cabecera:'',
        valor_n:'',
        respuesta:-1,
        respuestas:[],
        listaExamen :[],
        listaeliminar:[],
    },
    methods:{
        onlyNumber ($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        guardarinformacion(){
            swal({
                title: "Confirmar",
                text: "Nota total: "+nota_final,
                buttons: {
                    cancel: true,
                    confirm: "Confirmar",

                },
            }).then(function (res) {
                if (res){
                    $("#loader-menor").show()

                    $.ajax({
                        type: "POST",
                        url: URL+"/ajax/actividadcurso",
                        data: {tipo:'confirmar_nota',
                            actividad:$("#actividad_cod").val(),
                            estud:$("#estudiante").val(),nota_final
                        },
                        success: function (resp) {
                            console.log(resp)
                            $("#loader-menor").hide()
                            location.href = URL+'/profesores/examen/'+$("#actividad_cod").val();
                        }
                    });
                }
            })

        },
        data_primario(){
            $.ajax({
                type: "POST",
                url: URL+"/ajax/actividadcurso",
                data: {tipo:'quiz_dat_p',quiz:$("#quiz_id").val()},
                success: function (resp) {
                    console.log(resp)
                    resp=JSON.parse(resp)
                    APP._data.datConf.duracion_minutos=resp.duracion;
                    APP._data.datConf.nota_visible=resp.nota_visible;
                    APP._data.datConf.respuesta_visible=resp.mostrar_respusta;

                }
            });
        },
        onlyNumber ($event) {
            //console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }
        },
        acrualisarPregunta(){
            $("#loader-menor").show()
            $("#modal-registro-pregunta").modal('toggle')
            var respuesta='';
            if (this.tipo_pregunta+""=='3'){
                respuesta=$("#descripcion-corta-acti").summernote('code')
            }else if(this.tipo_pregunta+""=='1'){
                for (var i = 0; i<this.respuestas.length;i++){
                    if(this.respuestas[i].selec){
                        this.respuestas[i].selec='1';
                    }else{
                        this.respuestas[i].selec='0';
                    }
                }
            }else if(this.tipo_pregunta+""=='2'){
                for (var i = 0; i<this.respuestas.length;i++){
                    this.respuestas[i].selec='0';
                }
                if (this.respuesta>=0){
                    this.respuestas[this.respuesta].selec='1';
                }
            }
            var dataR={
                cod_pr: this.cod_pre,
                cod_contenido: this.doc_cont,
                tipo:'reg-updt',
                listaElimnar:JSON.stringify(this.listaeliminar),
                tipo_pre:this.tipo_pregunta,
                cabecera:this.cabecera,
                cuerpo:$("#cont-pregunta-body").summernote('code'),
                valor_nota: this.valor_n,
                resp_onli:this.respuesta,
                resp_cont:respuesta,
                cuestio:$("#quiz_id").val(),
                alternativas: JSON.stringify(this.respuestas)
            };
            $.ajax({
                type: "POST",
                url: URL+"/ajax/actividadcurso",
                data: dataR,
                success: function (resp) {
                    console.log(resp);
                    APP.getData();
                }
            });


        },
        eliminarAlternat(index){
            if (this.opd){
                this.listaeliminar.push(this.respuestas[index])
                this.respuestas.splice(index, 1);
            }else{
                this.respuestas.splice(index, 1);
            }
        },
        procesador(){
            if (this.opd){
                this.acrualisarPregunta();
            }else{
                this.agregarPregunta()
            }
        },
        setRegisterNe(){
            $("#cont-pregunta-body").summernote("code",'')
            this.respuestas=[]
            this.opd= false;
        },
        setDataE(data){
            this.doc_cont= data.escrito_cod
            this.listaeliminar=[];
            this.opd= true;
            this.cod_pre= data.pregunta_id
            console.log(data)
            $("#cont-pregunta-body").summernote("code",data.cuerpo)

            if (data.tipo_respuesta+""=='3'){
                setTimeout(function () {
                    $("#descripcion-corta-acti").summernote();
                    $("#descripcion-corta-acti").summernote("code",data.escrito);
                },500)
            }else{
                $("#descripcion-corta-acti").summernote('destroy')
            }
            var respp = -1;
            var alternativas = [];
            if (data.tipo_respuesta+""!='3'){
                for (var i =0; i < data.alternativas.length;i++){
                    if (data.tipo_respuesta+""=='2'){
                        if (data.alternativas[i].estado_res){
                            respp = i;
                        }
                    }

                    alternativas.push({
                        cod:data.alternativas[i].alternativa_id,
                        respu:data.alternativas[i].contenido,
                        selec:data.alternativas[i].estado_res,
                    })
                }
            }
            this.tipo_pregunta=parseInt(data.tipo_respuesta+"");
            this.cabecera=data.cabecera;
            this.valor_n=data.valor_nota;
            this.respuesta=respp;
            this.respuestas=alternativas;

        },
        refrescar(){
            this.respuesta=-1;
            for (var i = 0; i<this.respuestas.length;i++){
                this.respuestas[i].selec=false;
            }
        },
        getData(){

            $.ajax({
                type: "POST",
                url: URL+"/ajax/actividadcurso",
                data: {tipo:'quiz_res_es',
                    cod: $("#quiz_id").val(),
                intent:$("#intent").val()},
                success: function (resp) {
                   // console.log(resp)
                    resp = JSON.parse(resp);
                    $("#conenedor-ex-quiz").html(resp.dom)
                    $("#loader-menor").hide()
                }
            });

        },
        agregarPregunta(){
            $("#loader-menor").show()
            $("#modal-registro-pregunta").modal('toggle')
            var respuesta='';
            if (this.tipo_pregunta+""=='3'){
                respuesta=$("#descripcion-corta-acti").summernote('code')
            }else if(this.tipo_pregunta+""=='1'){
                for (var i = 0; i<this.respuestas.length;i++){
                    if(this.respuestas[i].selec){
                        this.respuestas[i].selec='1';
                    }else{
                        this.respuestas[i].selec='0';
                    }
                }
            }else if(this.tipo_pregunta+""=='2'){
                for (var i = 0; i<this.respuestas.length;i++){
                    this.respuestas[i].selec='0';
                }
                if (this.respuesta>=0){
                    this.respuestas[this.respuesta].selec='1';
                }
            }
            var dataR={
                tipo:'reg-preg',
                tipo_pre:this.tipo_pregunta,
                cabecera:this.cabecera,
                cuerpo:$("#cont-pregunta-body").summernote('code'),
                valor_nota: this.valor_n,
                resp_onli:this.respuesta,
                resp_cont:respuesta,
                cuestio:$("#quiz_id").val(),
                alternativas: JSON.stringify(this.respuestas)
            };
            $.ajax({
                type: "POST",
                url: URL+"/ajax/actividadcurso",
                data: dataR,
                success: function (resp) {
                    console.log(resp);
                    APP.getData();
                }
            });


        },
        getLetra(index){
            return abecedario(index);
        },
        addQuiz() {

                this.respuestas.push({
                    respu:$("#texto_respuesta").val(),
                    selec:false,
                })
            $("#texto_respuesta").val('')
        },
        onChange(event){
            console.log(event.target.value);
            if (event.target.value == '3'){
                console.log("33333333333333333333333")
                setTimeout(function () {
                    $("#descripcion-corta-acti").summernote()
                },600)
            }else{
                $("#descripcion-corta-acti").summernote('destroy')
                this.respuestas = [];
                if (event.target.value == '5'){
                    this.respuestas.push({
                        respu:'Verdadero',
                        selec:false,
                    })
                    this.respuestas.push({
                        respu:'Falso',
                        selec:false,
                    })
                }

            }
        }
    }
});
    function iniciarContruirExamne() {
        $.ajax({
            type: "POST",
            url: URL+'/ajax/consulta',
            data: {tipo:'expl-ex',actividad:$("#actividad_cod").val()},
            success: function (resp) {
                console.log(resp);
                resp=JSON.parse(resp);
                if (resp.res){
                    window.location.href = URL+"/profesores/actividad/quiz/"+resp.questinario;
                }

            }
        });
    }

    function eliminarFile(){
        $.ajax({
            type: "POST",
            url: URL+'/',
            data: data,
            success: function (resp) {
                console.log(resp);
            }
        });

    }
    $(document).ready(function () {

        $("#archivo-acti").change(function(){
            if (this.files && this.files[0]){
                var fd = new FormData();

                fd.append('file',$("#archivo-acti")[0].files[0]);
                fd.append('actividadcurso',$("#actividad_cod").val());
                fd.append('curso',$("#curso_cod").val());
                fd.append('org','d');
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                $('.progress-bar').css('width', percentComplete+'%').attr('aria-valuenow', percentComplete);
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: URL+'/ajax/upload_file_activ',
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        console.log('inicio');
                        $(".progress").show();
                        $('.progress-bar').css('width', 0+'%').attr('aria-valuenow', 0);
                    },
                    error:function(err){
                        swal("Error","No se pudo subir el archivo", 'error');
                        console.log(err);
                    },
                    success: function(resp){
                        console.log(resp);
                        resp = JSON.parse(resp);
                        if (resp.res){
                            $("#conte_files").append('<li>' +
                                '<a href="'+URL+'/'+resp.ruta+'" target="_blank"><i class="fa fa-circle-o text-red"></i>'+resp.nombre+'</a></li>');
                            $(".progress").hide();
                        }else{
                            swal('Error')
                        }

                    }
                });
                $("#archivo-acti").val("");
            }

        });

        const max = 400;

        $("#editar-descripcion").click(function () {
            $("#editar-descripcion").hide();
            $("#guardar-descripcion").show();
            $("#descripcion-larga").summernote({
                height: 200
            });
        });

        $("#guardar-descripcion").click(function () {
            $("#editar-descripcion").show();
            $("#guardar-descripcion").hide();
            const descripcion = $("#descripcion-larga").summernote('code');
            $("#descripcion-larga").summernote('destroy');
            $.ajax({
                type: "POST",
                url: URL+'/ajax/actividadcurso',
                data: {tipo:'udt-descp',actividad:$("#actividad_cod").val(),descripcion},
                success: function (resp) {
                    console.log(resp)
                    APP.getdata();
                }
            });
        });

        //$("#descripcion-corta-acti").summernote({})
        $("#cont-pregunta-body").summernote({})
        /*$("#cont-pregunta-body").summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['math']],
            ],
            placeholder: 'Escriba su mensaje',
            height: 100,
            callbacks: {
                onKeydown: function (e) {
                    var t = e.currentTarget.innerText;
                    if (t.length >= max) {
                        //delete key
                        if (e.keyCode != 8)
                            e.preventDefault();
                        // add other keys ...
                    }
                },
                onKeyup: function (e) {
                    var t = e.currentTarget.innerText;
                    if (typeof callbackMax == 'function') {
                        callbackMax(max - t.length);
                    }
                },
                onPaste: function (e) {
                    var t = e.currentTarget.innerText;
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    var all = t + bufferText;
                    document.execCommand('insertText', false, all.trim().substring(0, 400));
                    if (typeof callbackMax == 'function') {
                        callbackMax(max - t.length);
                    }
                }
            }
        });
    */
    })

$(document).ready(function () {
    APP.data_primario();
    APP.getData();
})
    function renderHTML(contenedor) {

        $("#conte-primary").empty();
        $("#conte-primary").html(contenedor)
    }
</script>
</html>