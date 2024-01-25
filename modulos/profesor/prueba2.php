<?php include 'funcionalidades/fragment/head.php' ?>
<link rel="stylesheet" href="<?= URL::to('public/plugins/summernote/summernote-lite.css') ?>">
<link href="https://ckeditor.com/docs/ckeditor5/latest/snippets/features/mathtype/snippet.css">
<?php

?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
<script type="text/javascript">
    if (window.location.search !== '') {
        var urlParams = window.location.search;
        if (urlParams[0] == '?') {
            urlParams = urlParams.substr(1, urlParams.length);
            urlParams = urlParams.split('&');
            for (i = 0; i < urlParams.length; i = i + 1) {
                var paramVariableName = urlParams[i].split('=')[0];
                if (paramVariableName === 'language') {
                    _wrs_int_langCode = urlParams[i].split('=')[1];
                    break;
                }
            }
        }
    }
</script>
<!-- Editor Plugin -->
<script type="text/javascript" src="<?=URL::to('math/ckeditor4/ckeditor.js')?>"></script>

<!-- Style for html code -->
<link type="text/css" rel="stylesheet" href="<?=URL::to('math/css/prism.css')?>" />

<!-- Style
<link rel="stylesheet" href="<?=URL::to('math/css/style.css')?>"> -->

<!-- Roboto Font -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

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
</head>

<div id="loader-menor">
    <div class="lds-dual-ring"></div>
</div>

<input type="hidden" value="<?= ''?>" id="actividad_cod">
<input type="hidden" value="<?= '' ?>" id="quiz_id">
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
                            <a href="<?=URL::to('profesores/actividad/'.Tools::encrypt($contenido['id_actividad']))?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="conten-primary">
                    <div class="row" style="padding: 10px;min-height: 527px;">

                        <div id="example" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, example" title="Rich Text Editor, example">
                            <p>En &aacute;lgebra elemental, la f&oacute;rmula cuadr&aacute;tica es la soluci&oacute;n de la ecuaci&oacute;n cuadr&aacute;tica.</p>

                            <p style="text-align: center;"><math xmlns="http://www.w3.org/1998/Math/MathML"><mi>x</mi><mo>=</mo><mfrac><mrow><mo>-</mo><mi>b</mi><mo>&#177;</mo><msqrt><msup><mi>b</mi><mn>2</mn></msup><mo>-</mo><mn>4</mn><mi>a</mi><mi>c</mi></msqrt></mrow><mrow><mn>2</mn><mi>a</mi></mrow></mfrac></math></p>

                            <p><b>El agua est&aacute; hecha de dos elementos: hidr&oacute;geno y ox&iacute;geno. Si junta los dos gases junto con la energ&iacute;a, puede producir agua.</b></p>

                            <p style="text-align: center;"><math class="wrs_chemistry" xmlns="http://www.w3.org/1998/Math/MathML"><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>+</mo><msub><mi mathvariant="normal">O</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>&#8652;</mo><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mi mathvariant="normal">O</mi><mfenced><mi mathvariant="normal">l</mi></mfenced></math></p>

                            <p>&nbsp;</p>

                            <p>&nbsp;</p>
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
    <!-- Prism JS script to beautify the HTML code -->
    <script type="text/javascript" src="<?=URL::to('math/js/prism.js')?>"></script>

    <!-- WIRIS script -->
    <script type="text/javascript" src="<?=URL::to('math/js/wirislib.js')?>"></script>

    <!-- Google Analytics -->
    <script src="<?=URL::to('math/js/google_analytics.js')?>"></script>

    <script>
        if(typeof urlParams !== 'undefined') {
            var selectLang = document.getElementById('lang_select');
            selectLang.value = urlParams[1];
        }
    </script>
</body>
<script>
    //com.wiris.js.JsPluginViewer.parseElement(domElement, true, function(){})
    //$("#").summernote()


</script>
</html>