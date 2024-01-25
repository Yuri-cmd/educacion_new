<?php
include "../../functions/BD.php";
$opc = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opc) {
    case '96':

        $sql = "DELETE FROM niveles_educativos WHERE nivel_id = '{$_POST['nivel']}';";
        mysqli_query($con, $sql);
        echo $sql;
        die();
        break;
    case '1': // CONSULTA PRINCIPAL
        $sql = "SELECT * FROM niveles_educativos WHERE nivel_estatus='1'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;
    case '2': // AGREGAR NIVEL
        $instid = $_POST['instid'];
        $nilnom = $_POST['nilnom'];
        $sql2 = "INSERT INTO niveles_educativos SET nombre_nivel=UPPER('$nilnom'),insti_id='$instid',nivel_estatus='1'";
        //$sql2="INSERT INTO niveles_educativos VALUES ('0',UPPER('$nilnom'),'$instid')";
        if (!mysqli_query($con, $sql2)) {
            echo("Error description: " . mysqli_error($con));
        }
        //JSON RESPONSE
        $sql = "SELECT * FROM niveles_educativos ORDER BY nivel_id DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;
    case '3': // EDITAR NIVEL
        $idnil = $_POST['idnil'];
        $nilnomb = $_POST['nilnomb'];
        $sql0 = "UPDATE niveles_educativos set nombre_nivel=UPPER('$nilnomb') WHERE nivel_id ='$idnil'";
        $res0 = mysqli_query($con, $sql0);
        //
        $sql = "SELECT * FROM niveles_educativos ORDER BY nivel_id DESC LIMIT 1";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;
    case '4': // VALIDAR
        $idnil = $_POST['idniv'];
        $ntipo = $_POST['ntipo'];
        if ($ntipo == 'grado') {
            $sql = "SELECT * FROM grados WHERE nivel_id='$idnil'";
        }
        if ($ntipo == 'cursos') {
            $sql = "SELECT * FROM cursos WHERE nivel_academico_id='$idnil'";

        }
        $result = mysqli_query($con, $sql);
        $nrow = mysqli_num_rows($result);
        if ($nrow > '0') {
            //ENVIAR JSON
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            $listar = array("data" => $nrow);
            $data[] = $listar;
        }
        break;

    case '5': // CONSULTAR
        $idnil = $_POST['idniv'];
        $ntipo = $_POST['ntipo'];
        if ($ntipo == 'grado') {
            $sql = "SELECT * FROM grados WHERE nivel_id='$idnil'";
        }
        if ($ntipo == 'cursos') {
            $sql = "SELECT * FROM cursos WHERE nivel_academico_id='$idnil'";
        }
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;
    case '6': // AGREGAR GRADO
        $granom = $_POST['granom'];
        $graabre = $_POST['graabre'];
        $idniv = $_POST['idniv'];
        //
        $sql2 = "INSERT INTO grados VALUES ('0',UPPER('$granom'),UPPER('$graabre'),'$idniv')";
        if (!mysqli_query($con, $sql2)) {
            echo("Error description: " . mysqli_error($con));
        }

        //JSON
        $sql = "SELECT * FROM grados ";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;
    case '7': // EDITAR GRADO
        $granomb = $_POST['granomb'];
        $graabreb = $_POST['graabreb'];
        $idgrad = $_POST['idgrad'];
        //
        $sql0 = "UPDATE grados set nombre_grado =UPPER('$granomb'), abreviatura =UPPER('$graabreb') WHERE grado_id='$idgrad'";
        $res0 = mysqli_query($con, $sql0);
        //JSON
        $sql = "SELECT * FROM grados ";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;
    case '8': // EDITAR CURSO
        if ($_POST["action2"] == "upload") {
            $archivo = $_FILES["file"]["name"];
            $tamano = $_FILES["file"]["size"];
            $tipo = $_FILES["file"]["type"];
            $extension = pathinfo($_FILES["file"]["name"]);
            $extension = "." . $extension["extension"];
            $idcurb = $_POST['idcurb'];
            $bcurnom = $_POST['bcurnom'];
            $bcurdesc = $_POST['bcurdesc'];
            $idniv = $_POST['idniv'];
            //NOMBRE DEL BANNER
            $nomfoto = trim($bcurnom) . '_' . $idniv . $extension;
            // si el archivo es vacio
            if ($archivo != "" and (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano < 50000000)))) {
                unlink("../../../images/Institucion/Cursos/" . $nomfoto);
                // guardamos el archivo a la carpeta ficheros
                $destino = "../../../images/Institucion/Cursos/" . $nomfoto;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $destino)) {
                    $sql2 = "UPDATE cursos SET nombre =UPPER('$bcurnom'), descripcion =UPPER('$bcurdesc'), logo ='$nomfoto' WHERE curso_id='$idcurb'";
                    if (!mysqli_query($con, $sql2)) {
                        echo("Error description: " . mysqli_error($con));
                    }
                }
            } else {
                $sql2 = "UPDATE cursos SET nombre =UPPER('$bcurnom'), descripcion =UPPER('$bcurdesc') WHERE curso_id='$idcurb'";
                if (!mysqli_query($con, $sql2)) {
                    echo("Error description: " . mysqli_error($con));
                }
            }
            $sql = "SELECT * FROM cursos  WHERE curso_id ='$idcurb'";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        break;
    case '10': // AGREGAR CURSO
        if ($_POST["action"] == "upload") {
            if(isset($_FILES["file"])){
                $archivo = $_FILES["file"]["name"];
                $tamano = $_FILES["file"]["size"];
                $tipo = $_FILES["file"]["type"];
                $extension = pathinfo($_FILES["file"]["name"]);
                $extension = "." . $extension["extension"];
                $idniv = $_POST['idniv'];
                $curnom = $_POST['curnom'];
                $curdesc = $_POST['curdesc'];
                //NOMBRE DEL BANNER
                $nomfoto = trim($curnom) . '_' . $idniv . $extension;
                //$bimagen = $_POST['bimagen'];
                // si el archivo es vacio
                if ($archivo != "" and (!((strpos($tipo, "image/gif") || strpos($tipo, "image/jpeg") || strpos($tipo, "image/png")) && ($tamano < 50000000)))) {
                    // guardamos el archivo a la carpeta ficheros
                    $destino = "../../../images/Institucion/Cursos/" . $nomfoto;
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $destino)) {
                        $sql2 = "INSERT INTO cursos VALUES ('0','8',UPPER('$curnom'),UPPER('$curdesc'),'$nomfoto','$idniv',null)";
                        if (!mysqli_query($con, $sql2)) {
                            echo("Error description: " . mysqli_error($con));
                        }
                    }
                } else {
                    $sql2 = "INSERT INTO cursos VALUES ('0','8',UPPER('$curnom'),UPPER('$curdesc'),'','$idniv',null)";
                    if (!mysqli_query($con, $sql2)) {
                        echo("Error description: " . mysqli_error($con));
                    }
                }
                $sql = "SELECT * FROM cursos  WHERE nivel_academico_id ='$idniv' ORDER BY curso_id DESC LIMIT 1";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }else{
                $idniv = $_POST['idniv'];
                $curnom = $_POST['curnom'];
                $curdesc = $_POST['curdesc'];

                $sql2 = "INSERT INTO cursos VALUES ('0','8',UPPER('$curnom'),UPPER('$curdesc'),'','$idniv',null)";
                if (!mysqli_query($con, $sql2)) {
                    echo("Error description: " . mysqli_error($con));
                }
                $sql = "SELECT * FROM cursos  WHERE nivel_academico_id ='$idniv' ORDER BY curso_id DESC LIMIT 1";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }

        }

        break;
    case '11': // logo del curso
        $idcur = $_POST['idcur'];
        $sql = "SELECT *, (CASE WHEN logo is null THEN '0' ELSE logo END) logo2 FROM cursos  WHERE curso_id ='$idcur'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;

    case '9': // VALIDAR
        $sql = "SELECT * FROM niveles_educativos WHERE nivel_estatus='1'";
        $result = mysqli_query($con, $sql);
        $nrow = mysqli_num_rows($result);
        if ($nrow > '0') {
            //ENVIAR JSON
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            $listar = array("data" => $nrow);
            $data[] = $listar;
        }
        break;
}
print json_encode($data);


?>
