<?php
$conexion = (new Conexion())->getConexion();
$usuario = $_SESSION['usuario'];
//echo $usuario;
$sql = "SELECT count(*) as 'cnt_msg' FROM mensaje_usuarion WHERE id_usuario = '$usuario' AND estado = '0'";
$contador_newMen = 0;

if ($row_s = $conexion->query($sql)->fetch_assoc()) {
    $contador_newMen = $row_s['cnt_msg'];
}

?>
<style>
    .tag {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 20px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .tag button {
        background-color: transparent;
        border: none;
        color: #fff;
        font-size: 12px;
        margin-left: 5px;
        cursor: pointer;
    }

    .tag button:hover {
        text-decoration: underline;
    }
</style>
<div class="row">
    <div class="col-md-3">
        <?php if ($_SESSION['usuario_rol'] !== '2') : ?>
            <button data-toggle="modal" data-target="#modal-mensaje" class="btn btn-success btn-block margin-bottom"><i class="fa fa-plus"></i> Nueva Noticación</button>
            <button class="btn btn-success btn-block margin-bottom modal-grupo"><i class="fa fa-plus"></i> Nueva Grupo</button>
        <?php endif; ?>

        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Folders</h3>

                <div class="box-tools">
                    <button onclick="iniciamodal()" type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="bandeja" onclick="getBandeja()"><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Bandeja
                            <?= $contador_newMen != 0 ? '<span class="label label-primary pull-right">' . $contador_newMen . '</span>' : ''  ?>

                        </a></li>

                    <!-- <li class="Penviado" onclick="getEnviados()"><a href="javascript:void(0);"><i class="fa fa-envelope-o"></i> Enviados</a></li> -->

                </ul>
            </div>
        </div>
    </div>
    <div id="cont-prim">
        <?php include "bandeja_entrada.php" ?>
    </div>

</div>

<div class="modal fade" id="modal-mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Mensaje</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="grupo">Grupo:</label>
                    <select name="grupo" id="grupo" class="form-control">
                        <option value="">Seleccionar grupo</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" id="usuario_send">
                    <label for="usurio-para">Para:</label>
                    <input type="text" id="usurio-para" class="form-control" autocomplete="off" placeholder="">
                </div>
                <div class="form-group">
                    <label for="asuntoooo">Asunto:</label>
                    <input type="text" class="form-control" id="asuntoooo" placeholder="">
                </div>
                <div class="form-check">
                    <label>Mensaje:</label>
                    <div id="mensaje-con"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="enviarMensaje()" class="btn btn-primary">Enviar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-grupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Grupos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nameGroup">Nombre del grupo:</label>
                    <input type="text" id="nameGroup" class="form-control">
                </div>
                <div class="form-group">
                    <label for="curso">Curso:</label>
                    <select name="curso" id="curso" class="form-control">
                        <option value="">Seleccionar curso</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alumnos">Alumonos:</label>
                    <select name="alumnos" id="alumnos" class="form-control">
                        <option value="">Seleccionar Alumno</option>
                    </select>
                </div>
                <div id="tags-container"></div>
                <!-- Input oculto para almacenar IDs -->
                <input type="hidden" id="alumnos-ids" name="alumnos-ids">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary crear_grupo">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            </div>

        </div>
    </div>
</div>


<style>
    #ui-id-1 {
        z-index: 1065;
    }
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    function enviarMensaje() {
        let flag = $('#grupo').val() !== '' ? true : $("#usuario_send").val().length > 0;
        let esGrupo = $('#grupo').val() !== '' ? 1 : 0;
        if (flag) {
            $.ajax({
                type: "POST",
                url: URL + "/ajax/mensaje",
                data: {
                    tipo: 'send',
                    grupo: $('#grupo').val(),
                    user: $("#usuario_send").val(),
                    asunto: $("#asuntoooo").val(),
                    mensaje: $("#mensaje-con").summernote('code'),
                    esGrupo: esGrupo
                },
                success: function(res) {
                    if (res) {
                        $('#modal-mensaje').modal('hide')
                        $("#usuario_send").val('')
                        $("#asuntoooo").val('')
                        $("#mensaje-con").summernote('code', '')
                        swal("Exitoso", "Mensaje enviado", "success")
                    } else {
                        swal("Error", "Mensaje no enviado", "error")
                    }
                }
            });
        } else {
            swal("Alerta", "Busque el usuario", "error")
        }
    }

    function iniciamodal() {
        /*$("#mensaje-con").summernote({
            height: 200,
        })*/
    }
    window.onload = function() {
        $("#mensaje-con").summernote({
            height: 200,
        })
        $('.bandeja').addClass("active");
        $("#usurio-para").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: URL + "/ajax/buscarusuario",
                    data: {
                        term: request.term
                    },
                    success: function(data) {

                        console.log(data);
                        response(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText)
                    },
                    dataType: 'json'
                });
            },
            minLength: 2,
            select: function(event, ui) {
                console.log(ui.item)
                $("#usuario_send").val(ui.item.id_usuario)

            }
        });
    };

    function getMensaje(mensaje) {
        $("#loader-menor").show();
        $.ajax({
            type: "POST",
            url: URL + "/fragmento",
            data: {
                part: 'mensaje_fro',
                codmens: mensaje
            },
            success: function(resp) {
                //console.log(resp)
                $("#cont-prim").html(resp);
                $("#loader-menor").hide();
            }
        });
    }

    function getBandeja() {
        $("#loader-menor").show();
        $('.bandeja').addClass("active");
        $('.Penviado').removeClass("active");
        $.ajax({
            type: "POST",
            url: URL + "/fragmento",
            data: {
                part: 'bandeja_entrada'
            },
            success: function(resp) {
                //console.log(resp)
                $("#cont-prim").html(resp);
                $("#loader-menor").hide();
            }
        });

    }

    function getEnviados() {
        $("#loader-menor").show();
        $('.bandeja').removeClass("active");
        $('.Penviado').addClass("active");
        $.ajax({
            type: "POST",
            url: URL + "/fragmento",
            data: {
                part: 'bandeja_enviados'
            },
            success: function(resp) {
                //console.log(resp)
                $("#cont-prim").html(resp);
                $("#loader-menor").hide();
            }
        });

    }

    $(".modal-grupo").on('click', function(param) {
        let idUsuario = `<?php echo $usuario ?>`;
        $('#modal-grupo').modal('show');
        $.ajax({
            type: "POST",
            url: URL + "/ajax/mensajeria",
            data: {
                idUsuario: idUsuario,
                opcion: 'getCursosDocente'
            },
            success: function(resp) {
                var data = JSON.parse(resp);
                var selectCursos = document.getElementById('curso');

                // Limpiar las opciones existentes (excepto la primera opción "Seleccionar curso")
                selectCursos.innerHTML = '<option value="">Seleccionar curso</option>';

                data.forEach(function(curso) {
                    var option = document.createElement('option');
                    option.value = `${curso.curso_id}:${curso.grado}:${curso.nivel}:${curso.seccion}`; // Valor de la opción
                    option.textContent = curso.nombre; // Texto visible de la opción
                    selectCursos.appendChild(option);
                });
            }
        });
    });

    $('#curso').on('change', function() {
        var selectedCursoId = $(this).val();
        $.ajax({
            type: "POST",
            url: URL + "/ajax/mensajeria",
            data: {
                inf: selectedCursoId,
                opcion: 'getAlumnos'
            },
            success: function(resp) {
                var data = JSON.parse(resp);
                var selectAlumnos = document.getElementById('alumnos');

                // Limpiar las opciones existentes (excepto la primera opción "Seleccionar curso")
                selectAlumnos.innerHTML = '<option value="">Seleccionar Alumnos</option>';
                console.log(data);
                data.forEach(function(alumno) {
                    var option = document.createElement('option');
                    option.value = alumno.estu_id; // Valor de la opción
                    option.textContent = alumno.alumno; // Texto visible de la opción
                    selectAlumnos.appendChild(option);
                });
            }
        });
    });

    $('#alumnos').on('change', function() {
        var selectedValue = $(this).val();
        var selectedText = $(this).find('option:selected').text();

        // Verificar si el alumno ya fue seleccionado
        if ($('#alumnos-ids').val().indexOf(selectedValue) === -1) {
            // Agregar el tag con el nombre del alumno y el botón de eliminación
            $('#tags-container').append('<div class="tag" data-id="' + selectedValue + '">' + selectedText + ' <button class="delete-tag">X</button></div>');

            // Agregar el ID del alumno al input oculto
            if ($('#alumnos-ids').val() !== '') {
                $('#alumnos-ids').val($('#alumnos-ids').val() + ',' + selectedValue);
            } else {
                $('#alumnos-ids').val(selectedValue);
            }
        }
    });

    // Eliminar un tag al hacer clic en el botón (X)
    $('#tags-container').on('click', '.delete-tag', function() {
        var idToRemove = $(this).parent().data('id');
        $(this).parent().remove();

        // Eliminar el ID del alumno del input oculto
        var idsArray = $('#alumnos-ids').val().split(',');
        var index = idsArray.indexOf(idToRemove.toString());
        if (index !== -1) {
            idsArray.splice(index, 1);
            $('#alumnos-ids').val(idsArray.join(','));
        }
    });
    $('.crear_grupo').click(function() {
        var alumnosIds = $('#alumnos-ids').val();
        var curso = $("#curso").val();
        var nameGroup = $("#nameGroup").val();
        let idUsuario = `<?php echo $usuario ?>`;
        $.ajax({
            type: "POST",
            url: URL + "/ajax/mensajeria",
            data: {
                profesor: idUsuario,
                alumnosIds: alumnosIds,
                curso: curso,
                nameGroup: nameGroup,
                opcion: 'saveGrupo'
            },
            success: function(resp) {
                if (resp) {
                    swal("Alerta", "Error al guardar", "error");
                    return false;
                }

                $('#modal-grupo').modal('hide');
                swal("Alerta", "Guardado correctamente", "success");
            }
        });
    });

    let idUsuario = `<?php echo $usuario ?>`;
    $.ajax({
        type: "POST",
        url: URL + "/ajax/mensajeria",
        data: "data",
        data: {
            docente: idUsuario,
            opcion: 'getGrupos'
        },
        success: function(resp) {
            var data = JSON.parse(resp);
            var selectGrupo = document.getElementById('grupo');

            // Limpiar las opciones existentes (excepto la primera opción "Seleccionar curso")
            selectGrupo.innerHTML = '<option value="">Seleccionar Grupo</option>';
            data.forEach(function(grupo) {
                var option = document.createElement('option');
                option.value = grupo.id; // Valor de la opción
                option.textContent = grupo.nombre; // Texto visible de la opción
                selectGrupo.appendChild(option);
            });
        }
    });

    function saveRespuesta() {
        $("#loader-menor").show();
        let idUsuario = `<?php echo $usuario ?>`;
        if ($('.respuesta').val() !== '') {
            $.ajax({
                type: "POST",
                url: URL + "/ajax/mensajeria",
                data: {
                    idUsuario: idUsuario,
                    respuesta: $('.respuesta').val(),
                    idmensaje: $('.mensaje_cod').val(),
                    opcion: 'saveRespuesta'
                },
                success: function(resp) {
                    location.reload();
                    $("#loader-menor").hide();
                }
            });
        } else {
            swal("Info", "Debe llenar un mensaje", "info");
            $("#loader-menor").hide();
        }
    }
</script>